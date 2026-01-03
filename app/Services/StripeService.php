<?php

namespace App\Services;

use App\Models\School;
use Stripe\StripeClient;

class StripeService
{
    protected StripeClient $stripe;

    public function __construct()
    {
        $this->stripe = new StripeClient(config('services.stripe.secret'));
    }

    /**
     * Ensure the school has a Stripe Customer; create if needed.
     */
    public function getOrCreateCustomerForSchool(School $school): string
    {
        if ($school->stripe_customer_id) {
            return $school->stripe_customer_id;
        }

        $customer = $this->stripe->customers->create([
            'name'     => $school->name,
            // Email is optional; your schools table doesn't have it
            // You can later swap this to use the school admin user's email if you want.
            'metadata' => [
                'school_id' => $school->id,
            ],
        ]);

        $school->stripe_customer_id = $customer->id;
        $school->save();

        return $customer->id;
    }

    /**
     * Create a Checkout Session for a subscription to a single price.
     */
    public function createSubscriptionCheckoutSession(
        string $customerId,
        string $priceId,
        string $successUrl,
        string $cancelUrl
    ): string {
        $session = $this->stripe->checkout->sessions->create([
            'mode'       => 'subscription',
            'customer'   => $customerId,
            'line_items' => [
                [
                    'price'    => $priceId,
                    'quantity' => 1,
                ],
            ],
            'success_url' => $successUrl . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => $cancelUrl,
        ]);

        return $session->url;
    }

    /**
     * Map membership type + billing_period to a Stripe Price ID.
     */
    public static function getPriceId(string $type, string $billingPeriod): ?string
    {
        $type          = strtolower($type);
        $billingPeriod = strtolower($billingPeriod);

        if ($type === 'primary' && $billingPeriod === 'monthly') {
            return config('services.stripe.prices.primary_monthly');
        }
        if ($type === 'primary' && $billingPeriod === 'annual') {
            return config('services.stripe.prices.primary_annual');
        }
        if ($type === 'ji' && $billingPeriod === 'monthly') {
            return config('services.stripe.prices.ji_monthly');
        }
        if ($type === 'ji' && $billingPeriod === 'annual') {
            return config('services.stripe.prices.ji_annual');
        }

        return null;
    }
}
