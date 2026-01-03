<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolMembership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Subscription;
use Stripe\Webhook;
use UnexpectedValueException;
use Carbon\Carbon;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $payload   = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $secret    = config('services.stripe.webhook_secret');

        // If no secret is set (dev only), you *can* skip verification — but keep it for prod.
        if (! $secret) {
            Log::warning('Stripe webhook_secret not configured; parsing payload without verification.');

            $event = json_decode($payload);

            if (json_last_error() !== JSON_ERROR_NONE) {
                return response('Invalid payload', 400);
            }
        } else {
            try {
                $event = Webhook::constructEvent(
                    $payload,
                    $sigHeader,
                    $secret
                );
            } catch (UnexpectedValueException $e) {
                // Invalid payload
                Log::error('Stripe webhook invalid payload', ['error' => $e->getMessage()]);
                return response('Invalid payload', 400);
            } catch (SignatureVerificationException $e) {
                // Invalid signature
                Log::error('Stripe webhook invalid signature', ['error' => $e->getMessage()]);
                return response('Invalid signature', 400);
            }
        }

        $type    = $event->type ?? null;
        $object  = $event->data->object ?? null;

        switch ($type) {
            case 'customer.subscription.created':
            case 'customer.subscription.updated':
                $this->handleSubscriptionUpdated($object);
                break;

            case 'customer.subscription.deleted':
            case 'customer.subscription.canceled':
                $this->handleSubscriptionDeleted($object);
                break;

            default:
                // For now we ignore other events
                Log::info('Stripe webhook event received (ignored)', ['type' => $type]);
                break;
        }

        return response('Webhook handled', 200);
    }

    /**
     * Create or update a SchoolMembership based on Stripe Subscription.
     *
     * @param  \Stripe\Subscription|object  $subscription
     */
    protected function handleSubscriptionUpdated($subscription): void
    {
        // Stripe\Subscription object
        $subscriptionId = $subscription->id;
        $customerId     = $subscription->customer;

        // First line item price
        $items = $subscription->items->data ?? [];
        if (count($items) === 0) {
            Log::warning('Stripe subscription has no items', ['subscription_id' => $subscriptionId]);
            return;
        }

        /** @var \Stripe\Price $price */
        $price = $items[0]->price;
        $priceId = $price->id;

        // Find the school using customer id
        $school = School::where('stripe_customer_id', $customerId)->first();

        if (! $school) {
            Log::error('Stripe webhook: school not found for customer', [
                'customer_id' => $customerId,
                'subscription_id' => $subscriptionId,
            ]);
            return;
        }

        // Map priceId -> type + billing_period
        [$type, $billingPeriod] = $this->mapPriceToPlan($priceId);

        if (! $type || ! $billingPeriod) {
            Log::error('Stripe webhook: unknown price id', [
                'price_id'        => $priceId,
                'subscription_id' => $subscriptionId,
            ]);
            return;
        }

        // Convert timestamps
        $currentPeriodStart = Carbon::createFromTimestamp($subscription->current_period_start);
        $currentPeriodEnd   = Carbon::createFromTimestamp($subscription->current_period_end);

        // Map Stripe status to our status
        $status = $this->mapSubscriptionStatus($subscription->status);

        // Upsert membership
        $membership = SchoolMembership::firstOrNew([
            'school_id' => $school->id,
            'type'      => $type,
        ]);

        $membership->billing_period        = $billingPeriod;
        $membership->is_free               = false;
        $membership->stripe_subscription_id = $subscriptionId;
        // optional:
        // $membership->stripe_price_id       = $priceId;
        $membership->starts_at             = $currentPeriodStart;
        $membership->ends_at               = $currentPeriodEnd;
        $membership->status                = $status;

        $membership->save();

        Log::info('Stripe webhook: membership updated', [
            'school_id'       => $school->id,
            'type'            => $type,
            'billing_period'  => $billingPeriod,
            'status'          => $status,
            'subscription_id' => $subscriptionId,
        ]);
    }

    /**
     * Mark membership as cancelled when subscription is deleted.
     */
    protected function handleSubscriptionDeleted($subscription): void
    {
        $subscriptionId = $subscription->id ?? null;

        if (! $subscriptionId) {
            return;
        }

        $membership = SchoolMembership::where('stripe_subscription_id', $subscriptionId)->first();

        if (! $membership) {
            Log::warning('Stripe subscription deleted but membership not found', [
                'subscription_id' => $subscriptionId,
            ]);
            return;
        }

        $membership->status = SchoolMembership::STATUS_CANCELLED ?? 'cancelled';
        $membership->save();

        Log::info('Stripe webhook: membership cancelled', [
            'membership_id'   => $membership->id,
            'subscription_id' => $subscriptionId,
        ]);
    }

    /**
     * Map a Stripe Price ID to our internal type & billing period.
     */
    protected function mapPriceToPlan(string $priceId): array
    {
        $config = config('services.stripe.prices');

        if ($priceId === $config['primary_monthly']) {
            return [SchoolMembership::TYPE_PRIMARY ?? 'primary', 'monthly'];
        }
        if ($priceId === $config['primary_annual']) {
            return [SchoolMembership::TYPE_PRIMARY ?? 'primary', 'annual'];
        }
        if ($priceId === $config['ji_monthly']) {
            return [SchoolMembership::TYPE_JI ?? 'ji', 'monthly'];
        }
        if ($priceId === $config['ji_annual']) {
            return [SchoolMembership::TYPE_JI ?? 'ji', 'annual'];
        }

        return [null, null];
    }

    /**
     * Map Stripe subscription status to our internal status.
     */
    protected function mapSubscriptionStatus(string $stripeStatus): string
    {
        // Our statuses: active, cancelled, expired (from earlier work)
        switch ($stripeStatus) {
            case 'active':
            case 'trialing':
                return SchoolMembership::STATUS_ACTIVE ?? 'active';

            case 'canceled':
            case 'unpaid':
            case 'incomplete_expired':
                return SchoolMembership::STATUS_CANCELLED ?? 'cancelled';

            case 'past_due':
            case 'incomplete':
            default:
                // You can customize this later if you want
                return SchoolMembership::STATUS_ACTIVE ?? 'active';
        }
    }
}
