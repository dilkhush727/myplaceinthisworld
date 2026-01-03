<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function embed(string $text): array
    {
        $resp = Http::withToken(config('services.openai.key'))
            ->acceptJson()
            ->post('https://api.openai.com/v1/embeddings', [
                'model' => config('services.openai.embedding_model', 'text-embedding-3-small'),
                'input' => $text,
            ]);

        if (!$resp->successful()) {
            throw new \RuntimeException("Embedding failed: {$resp->status()} - {$resp->body()}");
        }

        return $resp->json('data.0.embedding') ?? [];
    }

    public function respond(string $instructions, string $input, int $maxTokens = 400): string
    {
        $resp = Http::withToken(config('services.openai.key'))
            ->acceptJson()
            ->post('https://api.openai.com/v1/responses', [
                'model' => config('services.openai.model', 'gpt-4o-mini'),
                'instructions' => $instructions,
                'input' => $input,
                'max_output_tokens' => max(16, $maxTokens),
                'temperature' => 0.2,
                'store' => false,
            ]);

        if (!$resp->successful()) {
            throw new \RuntimeException("Response failed: {$resp->status()} - {$resp->body()}");
        }

        // Try to extract text safely
        $json = $resp->json();

        // Common shortcut
        if (!empty($json['output_text'])) {
            return trim($json['output_text']);
        }

        // Robust extraction from output message items
        $out = [];
        foreach (($json['output'] ?? []) as $item) {
            foreach (($item['content'] ?? []) as $c) {
                if (($c['type'] ?? '') === 'output_text' && isset($c['text'])) {
                    $out[] = $c['text'];
                }
            }
        }

        return trim(implode("\n", $out)) ?: "Sorry — I couldn’t generate a response right now.";
    }

}
