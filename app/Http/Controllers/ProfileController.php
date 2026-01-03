<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        $user = $request->user();

        // decide layout based on role (we’ll use this in Blade)
        $layout = 'layouts.app';
        if ($user->hasRole('admin')) $layout = 'layouts.admin';
        if ($user->hasRole('school')) $layout = 'layouts.school';
        if ($user->hasRole('teacher')) $layout = 'layouts.teacher';

        return view('profile.edit', [
            'user' => $user,
            'layout' => $layout,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = $request->user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'designation' => ['nullable', 'string', 'max:120'],
            'level' => ['nullable', 'string', 'max:60'],
            'bio' => ['nullable', 'string', 'max:2000'],

            // social_links will come as array: social_links[linkedin], etc.
            'social_links' => ['nullable', 'array'],
        ]);

        // Clean social links (remove empty values)
        $social = $request->input('social_links', []);
        if (is_array($social)) {
            $social = array_map(fn($v) => is_string($v) ? trim($v) : $v, $social);
            $social = array_filter($social, fn($v) => !empty($v));
        } else {
            $social = null;
        }

        $user->fill($validated);
        $user->social_links = $social ?: null;

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function updatePassword(Request $request): RedirectResponse
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = $request->user();
        $user->password = $request->password;
        $user->save();

        return Redirect::route('profile.edit')->with('success', 'Password updated successfully.');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $user = $request->user();

        // delete old photo if exists
        if ($user->profile_photo_path && Storage::disk('public')->exists($user->profile_photo_path)) {
            Storage::disk('public')->delete($user->profile_photo_path);
        }

        $path = $request->file('photo')->store('profile-photos', 'public');

        $user->profile_photo_path = $path;
        $user->save();

        return response()->json([
            'message' => 'Photo updated.',
            'url' => $user->profile_photo_url, // uses accessor
            'path' => $path,
        ]);
    }

    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
