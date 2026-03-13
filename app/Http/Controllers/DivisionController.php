<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolMembership;
use App\Models\Course;

class DivisionController extends Controller
{
    /**
     * Divisions overview page (logged-in area)
     */
    public function index()
    {
        $user   = auth()->user();
        $school = $user->school;

        if (!$school) {
            abort(403, 'No school associated with this user.');
        }

        // Helpful flags for the view (optional, but handy)
        $hasPrimaryMembership = $school->hasActiveMembership(SchoolMembership::TYPE_PRIMARY);
        $hasJiMembership      = $school->hasActiveMembership(SchoolMembership::TYPE_JI);
        $hasHighschool        = $school->hasActiveMembership(SchoolMembership::TYPE_HIGHSCHOOL);

        return view('divisions.index', [
            'school'               => $school,
            'hasPrimaryMembership' => $hasPrimaryMembership,
            'hasJiMembership'      => $hasJiMembership,
            'hasHighschool'        => $hasHighschool,
        ]);
    }

    /**
     * Primary division – list of Primary courses
     */
    public function primary()
    {
        $user = auth()->user();

        // Admin bypass
        if ($user->hasRole('admin')) {

            $courses = Course::published()
                ->forDivision('primary')
                ->orderBy('title')
                ->get();

            return view('divisions.primary', [
                'school'  => null,
                'courses' => $courses,
            ]);
        }

        $school = $user->school;

        if (!$school || !$school->hasActiveMembership(SchoolMembership::TYPE_PRIMARY)) {
            return redirect()
                ->route('school.memberships.manage')
                ->with('error', 'Your school does not have an active Primary membership.');
        }

        $courses = Course::published()
            ->forDivision('primary')
            ->orderBy('title')
            ->get();

        return view('divisions.primary', [
            'school'  => $school,
            'courses' => $courses,
        ]);
    }

    /**
     * Junior-Intermediate division – list of JI courses
     */
    public function juniorIntermediate()
    {
        $user = auth()->user();

        // Admin bypass
        if ($user->hasRole('admin')) {

            $courses = Course::published()
                ->forDivision('ji')
                ->orderBy('title')
                ->get();

            return view('divisions.ji', [
                'school'  => null,
                'courses' => $courses,
            ]);
        }

        $school = $user->school;

        if (!$school || !$school->hasActiveMembership(SchoolMembership::TYPE_JI)) {
            return redirect()
                ->route('school.memberships.manage')
                ->with('error', 'Your school does not have an active Junior–Intermediate membership.');
        }

        $courses = Course::published()
            ->forDivision('ji')
            ->orderBy('title')
            ->get();

        return view('divisions.ji', [
            'school'  => $school,
            'courses' => $courses,
        ]);
    }

    /**
     * High School division (always free, but still stored as a membership)
     */
    public function highSchool()
    {
        $user = auth()->user();

        // ✅ Admins bypass membership checks
        if ($user->hasRole('admin')) {

            $courses = Course::published()
                ->forDivision('highschool')
                ->orderBy('title')
                ->get();

            return view('divisions.highschool', [
                'school'  => null,
                'courses' => $courses,
            ]);
        }

        // School users
        $school = $user->school;

        if (!$school || !$school->hasActiveMembership(SchoolMembership::TYPE_HIGHSCHOOL)) {
            return redirect()
                ->route('school.memberships.manage')
                ->with('error', 'High School membership is not active for this school.');
        }

        $courses = Course::published()
            ->forDivision('highschool')
            ->orderBy('title')
            ->get();

        return view('divisions.highschool', [
            'school'  => $school,
            'courses' => $courses,
        ]);
    }
}
