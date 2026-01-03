<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\SchoolMembership;
use Illuminate\Http\Request;

class SchoolMembershipController extends Controller
{
    /**
     * List all schools and a quick view of their memberships.
     */
    public function index(Request $request)
    {
        $schools = School::with(['memberships' => function ($q) {
                $q->orderBy('type')->orderByDesc('starts_at');
            }])
            ->orderBy('name')
            ->paginate(20);

        return view('admin.memberships.index', [
            'schools' => $schools,
        ]);
    }

    /**
     * Show membership details for a single school.
     */
    public function show(School $school)
    {
        $school->load(['memberships' => function ($q) {
            $q->orderBy('type')->orderByDesc('starts_at');
        }]);

        return view('admin.memberships.show', [
            'school' => $school,
        ]);
    }

    /**
     * Admin: grant a membership to a school (or add a new term).
     */
    public function grant(Request $request, School $school)
    {
        $data = $request->validate([
            'type'           => 'required|in:primary,ji,highschool',
            'billing_period' => 'required|in:monthly,annual,free',
            'is_free'        => 'sometimes|boolean',
        ]);

        $isFree = $request->boolean('is_free') || $data['billing_period'] === 'free';

        $startsAt = now();

        if ($isFree) {
            $endsAt = null;
        } else {
            $endsAt = $data['billing_period'] === 'monthly'
                ? now()->copy()->addMonth()
                : now()->copy()->addYear();
        }

        SchoolMembership::create([
            'school_id'      => $school->id,
            'type'           => $data['type'],
            'billing_period' => $isFree ? 'free' : $data['billing_period'],
            'is_free'        => $isFree,
            'status'         => 'active',
            'starts_at'      => $startsAt,
            'ends_at'        => $endsAt,
        ]);

        return redirect()
            ->route('admin.memberships.show', $school->id)
            ->with('success', 'Membership granted/extended for this school.');
    }

    /**
     * Admin: update status of a specific membership (active/cancelled/expired).
     */
    public function updateStatus(Request $request, SchoolMembership $membership)
    {
        $data = $request->validate([
            'status' => 'required|in:active,cancelled,expired',
        ]);

        $membership->status = $data['status'];

        // If we mark expired and there is no end date, set it to now
        if ($data['status'] === 'expired' && !$membership->ends_at) {
            $membership->ends_at = now();
        }

        $membership->save();

        return back()->with('success', 'Membership status updated.');
    }
}
