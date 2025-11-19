<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use App\Models\School;
use Spatie\Permission\Models\Role;
use App\Models\SchoolMembership;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // 1️⃣ Create a school entry for this user
        $school = School::create([
            'name' => $request->name . "'s School",
        ]);

        // 2️⃣ Create user and link to school
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'school_id' => $school->id,
        ]);

        // 3️⃣ Assign school role
        $user->assignRole('school');

        // 4️⃣ Create FREE High School membership
        SchoolMembership::create([
            'school_id'      => $school->id,
            'type'           => SchoolMembership::TYPE_HIGHSCHOOL,
            'billing_period' => null, // free
            'is_free'        => true,
            'status'         => SchoolMembership::STATUS_ACTIVE,
            'starts_at'      => now(),
            'ends_at'        => null, // no expiry for base HS
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->intended('/school/dashboard');
    }
}
