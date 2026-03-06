<?php

use App\Services\DeeplTranslator;

if (!function_exists('t')) {

    function t(string $group, string $text): string
    {
        $locale = app()->getLocale();

        if ($locale === 'en') {
            return $text;
        }

        return app(DeeplTranslator::class)
            ->translate($group, $text, $locale);
    }
}
