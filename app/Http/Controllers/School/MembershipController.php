<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolMembership;

use App\Services\StripeService;
use Illuminate\Support\Facades\Log;


class MembershipController extends Controller
{

    public function manage()
    {
        $school = auth()->user()->school;

        $memberships = $school->memberships()
            ->orderBy('type')
            ->get();

        return view('school.memberships.manage', compact('school', 'memberships'));
    }

    /**
     * Upgrade membership page
     */
    public function upgrade()
    {
        $school = auth()->user()->school;

        // Load all memberships of the school
        $memberships = $school->memberships()->get();

        return view('school.memberships.upgrade', compact('school', 'memberships'));
    }


    /**
     * PURCHASE new membership (Primary or JI)
     */
    public function purchase(Request $request, StripeService $stripeService)
    {
        $user   = auth()->user();
        $school = $user->school;

        if (! $school) {
            abort(403, 'No school associated with this user.');
        }

        // Validate input from the Upgrade page forms
        $data = $request->validate([
            'type'           => 'required|in:primary,ji',     // HS is always free, no Stripe
            'billing_period' => 'required|in:monthly,annual',
        ]);

        $type          = $data['type'];
        $billingPeriod = $data['billing_period'];

        // Get the correct Stripe Price ID from config
        $priceId = StripeService::getPriceId($type, $billingPeriod);

        if (! $priceId) {
            return back()->with('error', 'Invalid membership plan selection.');
        }

        // Ensure the school has a Stripe Customer
        $customerId = $stripeService->getOrCreateCustomerForSchool($school);

        // Success & cancel URLs (back to Manage Memberships)
        $successUrl = route('school.memberships.manage');
        $cancelUrl  = route('school.memberships.manage');

        try {
            // Create Stripe Checkout Session for subscription
            $checkoutUrl = $stripeService->createSubscriptionCheckoutSession(
                $customerId,
                $priceId,
                $successUrl,
                $cancelUrl
            );
        } catch (\Throwable $e) {
            Log::error('Stripe Checkout session failed', [
                'error' => $e->getMessage(),
            ]);

            return back()->with('error', 'There was an error starting the payment process. Please try again or contact support.');
        }

        // Redirect the school to Stripe Checkout
        return redirect()->away($checkoutUrl);
    }


    /**
     * RENEW membership (extend expiry)
     */
    public function renew(Request $request)
    {
        $request->validate([
            'type'           => 'required|in:primary,ji',
            'billing_period' => 'required|in:monthly,annual',
        ]);

        $school = auth()->user()->school;

        $membership = $school->activeMemberships()
            ->where('type', $request->type)
            ->first();

        if (!$membership) {
            return back()->with('error', 'Membership not found to renew.');
        }

        // New expiry
        $extraTime = $request->billing_period === 'annual'
            ? now()->addYear()
            : now()->addMonth();

        // If membership had expiry → add to it
        if ($membership->ends_at) {
            $membership->ends_at = $membership->ends_at->add($extraTime->diff(now()));
        } else {
            $membership->ends_at = $extraTime;
        }

        $membership->billing_period = $request->billing_period;
        $membership->save();

        return back()->with('success', ucfirst($request->type) . ' membership renewed successfully!');
    }


    /**
     * CHANGE billing period (Monthly <-> Annual)
     */
    public function changeBilling(Request $request)
    {
        $request->validate([
            'type'           => 'required|in:primary,ji',
            'billing_period' => 'required|in:monthly,annual',
        ]);

        $school = auth()->user()->school;

        $membership = $school->activeMemberships()
            ->where('type', $request->type)
            ->first();

        if (!$membership) {
            return back()->with('error', 'Membership not found.');
        }

        // Change billing → reset expiry appropriately
        $membership->billing_period = $request->billing_period;
        $membership->ends_at = $request->billing_period === 'annual'
            ? now()->addYear()
            : now()->addMonth();

        $membership->save();

        return back()->with('success', ucfirst($request->type) . ' billing updated successfully!');
    }


    /**
     * CANCEL membership
     */
    public function cancel(Request $request)
    {
        $request->validate([
            'type' => 'required|in:primary,ji',
        ]);

        $school = auth()->user()->school;

        $membership = $school->activeMemberships()
            ->where('type', $request->type)
            ->first();

        if (!$membership) {
            return back()->with('error', 'Membership not found to cancel.');
        }

        $membership->update([
            'status' => SchoolMembership::STATUS_CANCELLED,
        ]);

        return back()->with('success', ucfirst($request->type) . ' membership cancelled.');
    }
}
