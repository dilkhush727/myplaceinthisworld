<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureDivisionSubscription
{
    public function handle(Request $request, Closure $next, string $divisionKey)
    {
        $user = $request->user();

        // Admin always allowed
        if ($user->hasRole('admin')) {
            return $next($request);
        }

        // ✅ High School is free — let everyone in
        if ($divisionKey === 'high_school') {
            return $next($request);
        }

        // ✅ TODO: your real checks for paid divisions
        $hasAccess = false; // replace for primary / junior_intermediate

        if (! $hasAccess) {
            return redirect()->route('school.memberships.upgrade')
                ->with('error', 'Subscription required for this division.');
        }

        return $next($request);
    }

}
