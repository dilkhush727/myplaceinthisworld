<?php

namespace App\Services;

use App\Models\Translation;
use Illuminate\Support\Facades\Http;

class DeeplTranslator
{
    private function endpoint(): string
    {
        // DeepL Free vs Pro endpoints
        return config('services.deepl.is_free')
            ? 'https://api-free.deepl.com/v2/translate'
            : 'https://api.deepl.com/v2/translate';
    }

    /**
     * Translate text with caching.
     *
     * @param string $group  Stable key like "pages.about.title"
     * @param string $text   Source text (English)
     * @param string $targetLocale "fr" or "en"
     */
    public function translate(string $group, string $text, string $targetLocale): string
    {
        $text = trim($text);

        if ($text === '') {
            return $text;
        }

        // If English requested, return original (EN is source)
        if (strtolower($targetLocale) === 'en') {
            return $text;
        }

        $hash = hash('sha256', $text);

        // Check cache first
        $cached = Translation::where('group', $group)
            ->where('locale', strtolower($targetLocale))
            ->where('source_hash', $hash)
            ->first();

        if ($cached) {
            return $cached->translated_text;
        }

        // 🔥 NEW: Header-based authentication
        $response = Http::withHeaders([
            'Authorization' => 'DeepL-Auth-Key ' . config('services.deepl.key'),
        ])->asForm()->post($this->endpoint(), [
            'text' => $text,
            'source_lang' => 'EN',
            'target_lang' => strtoupper($targetLocale),
        ]);

        // If API fails, return original safely
        if (!$response->ok()) {
            return $text;
        }

        $translated = data_get($response->json(), 'translations.0.text', $text);

        // Save to DB cache
        Translation::create([
            'group' => $group,
            'locale' => strtolower($targetLocale),
            'source_text' => $text,
            'translated_text' => $translated,
            'source_hash' => $hash,
        ]);

        return $translated;
    }
}