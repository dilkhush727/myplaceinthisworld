<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('locale') ?? 'en';

        if (!in_array($locale, ['en', 'fr'], true)) {
            $locale = 'en';
        }

        // set application locale
        App::setLocale($locale);

        // 🔑 GLOBAL FIX: make all route() calls include the locale
        URL::defaults(['locale' => $locale]);

        return $next($request);
    }
}