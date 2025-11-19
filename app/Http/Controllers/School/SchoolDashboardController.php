<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SchoolDashboardController extends Controller
{
    public function index()
    {
        $school = auth()->user()->school;

        // Load active memberships
        $activeMemberships = $school->activeMemberships()->get();

        return view('school.dashboard', compact('school', 'activeMemberships'));
    }
}
