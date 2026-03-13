<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // return redirect()->intended(route('dashboard', absolute: false));

        // 1) If user was redirected to login from a protected page,
        // Laravel stored that URL as "intended". Go there first.
        if ($request->session()->has('url.intended')) {
            return redirect()->to($request->session()->pull('url.intended'));
        }
        
        return $this->redirectUser();
    }
    
    protected function redirectUser()
    {
        $user = auth()->user();
        $locale = request()->route('locale') ?? app()->getLocale();

        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard', ['locale' => $locale]);
        }

        if ($user->hasRole('school')) {
            return redirect()->route('school.dashboard', ['locale' => $locale]);
        }

        if ($user->hasRole('teacher')) {
            return redirect()->route('teacher.dashboard', ['locale' => $locale]);
        }

        return redirect()->route('home', ['locale' => $locale]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $locale = request()->route('locale') ?? app()->getLocale();
        return redirect()->route('home', ['locale' => $locale]);
    }
}
