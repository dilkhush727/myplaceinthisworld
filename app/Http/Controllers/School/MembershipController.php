<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolMembership;

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
    public function purchase(Request $request)
    {
        $request->validate([
            'type'           => 'required|in:primary,ji',
            'billing_period' => 'required|in:monthly,annual',
        ]);

        $school = auth()->user()->school;

        // Prevent duplicate active add-ons
        if ($school->hasActiveMembership($request->type)) {
            return back()->with('error', ucfirst($request->type) . ' membership is already active.');
        }

        // Calculate expiry
        $startsAt = now();
        $endsAt = $request->billing_period === 'annual'
            ? now()->addYear()
            : now()->addMonth();

        // Create membership row
        SchoolMembership::create([
            'school_id'      => $school->id,
            'type'           => $request->type,
            'billing_period' => $request->billing_period,
            'is_free'        => false,
            'status'         => SchoolMembership::STATUS_ACTIVE,
            'starts_at'      => $startsAt,
            'ends_at'        => $endsAt,
        ]);

        return redirect()->route('school.dashboard')
            ->with('success', ucfirst($request->type) . ' membership purchased successfully!');
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
