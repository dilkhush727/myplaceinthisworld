<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolMembership;

class DivisionController extends Controller
{
    /**
     * Divisions overview page
     */
    public function index()
    {
        $user = auth()->user();
        $school = $user->school;

        if (!$school) {
            abort(403, 'No school associated with this user.');
        }

        return view('divisions.index', [
            'school' => $school,
        ]);
    }

    /**
     * Primary division
     */
    public function primary()
    {
        $user = auth()->user();
        $school = $user->school;

        if (!$school || !$school->hasActiveMembership(SchoolMembership::TYPE_PRIMARY)) {
            return redirect()
                ->route('school.memberships.manage')
                ->with('error', 'Your school does not have an active Primary membership.');
        }

        return view('divisions.primary', [
            'school' => $school,
        ]);
    }

    /**
     * Junior-Intermediate division
     */
    public function juniorIntermediate()
    {
        $user = auth()->user();
        $school = $user->school;

        if (!$school || !$school->hasActiveMembership(SchoolMembership::TYPE_JI)) {
            return redirect()
                ->route('school.memberships.manage')
                ->with('error', 'Your school does not have an active Junior–Intermediate membership.');
        }

        return view('divisions.ji', [
            'school' => $school,
        ]);
    }

    /**
     * High School division (always free)
     */
    public function highSchool()
    {
        $user = auth()->user();
        $school = $user->school;

        if (!$school || !$school->hasActiveMembership(SchoolMembership::TYPE_HIGHSCHOOL)) {
            // In theory this should never happen, since HS is free on registration
            return redirect()
                ->route('school.memberships.manage')
                ->with('error', 'High School membership is not active for this school.');
        }

        return view('divisions.highschool', [
            'school' => $school,
        ]);
    }
}
