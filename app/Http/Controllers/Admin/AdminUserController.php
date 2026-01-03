<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $role = $request->query('role', 'all'); // all|admin|school|teacher
        $schoolId = $request->query('school_id');
        $q = $request->query('q');

        $usersQuery = User::query()
            ->with(['roles', 'school'])
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'like', "%{$q}%")
                       ->orWhere('email', 'like', "%{$q}%");
                });
            })
            ->when($role !== 'all', function ($query) use ($role) {
                $query->whereHas('roles', function ($r) use ($role) {
                    $r->where('name', $role);
                });
            })
            ->when($role === 'teacher' && $schoolId, function ($query) use ($schoolId) {
                $query->where('school_id', $schoolId);
            })
            ->latest();

        $users = $usersQuery->paginate(15)->withQueryString();

        // For filter dropdown
        $schools = School::orderBy('name')->get(['id', 'name']);

        return view('admin.users.index', compact('users', 'schools', 'role', 'schoolId', 'q'));
    }

    public function show(User $user)
    {
        $user->load(['roles', 'school.memberships']);

        $activeMemberships = collect();
        if ($user->school) {
            $activeMemberships = $user->school->activeMemberships()->get();
        }

        return view('admin.users.show', compact('user', 'activeMemberships'));
    }
}
