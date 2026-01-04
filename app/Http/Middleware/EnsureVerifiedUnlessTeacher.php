<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureVerifiedUnlessTeacher
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Teachers: skip verification requirement
        $isTeacher =
            (method_exists($user, 'hasRole') && $user->hasRole('teacher')) // Spatie
            || (($user->role ?? null) === 'teacher'); // if you store role in a column

        if ($isTeacher) {
            return $next($request);
        }

        // Everyone else: require verification
        if (method_exists($user, 'hasVerifiedEmail') && !$user->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        return $next($request);
    }
}
