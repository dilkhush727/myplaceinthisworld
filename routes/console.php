<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Http;

use App\Models\ChatKnowledgeDoc;
use App\Services\OpenAIService;

use App\Services\ChatbotRetrievalService;

use App\Services\ChatbotService;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// ⭐ Run daily at 2 AM to keep membership statuses in sync
Schedule::command('memberships:update-statuses')->dailyAt('02:00');

// ✅ OpenAI quick connection test
Artisan::command('openai:test', function () {
    $key = config('services.openai.key');

    if (!$key) {
        $this->error('OPENAI_API_KEY missing');
        return;
    }

    $resp = Http::withToken($key)
        ->acceptJson()
        ->post('https://api.openai.com/v1/responses', [
            'model' => config('services.openai.model', 'gpt-4o-mini'),
            'input' => 'Say "OK" only.',
            'max_output_tokens' => 16,
        ]);

    if (!$resp->successful()) {
        $this->error('Request failed: ' . $resp->status());
        $this->line($resp->body());
        return;
    }

    $this->info('OpenAI connected ✅');

    // Responses API may return output_text, but we also print full JSON if needed
    $outText = $resp->json('output_text');
    $this->line($outText ?: json_encode($resp->json()));
});

Artisan::command('chatbot:embed {--rebuild}', function (OpenAIService $openai) {
    $rebuild = (bool) $this->option('rebuild');

    $query = ChatKnowledgeDoc::query();
    if (!$rebuild) {
        $query->whereNull('embedding');
    }

    $docs = $query->orderBy('id')->get();

    if ($docs->isEmpty()) {
        $this->info('No docs to embed.');
        return;
    }

    $this->info("Embedding {$docs->count()} doc(s)...");

    foreach ($docs as $doc) {
        $this->line("→ {$doc->key}");

        $text = mb_substr($doc->content, 0, 8000);
        $vector = $openai->embed($text);

        if (empty($vector)) {
            $this->warn("  ⚠ Empty embedding for {$doc->key}");
            continue;
        }

        $doc->embedding = $vector;
        $doc->save();

        usleep(150000);
    }

    $this->info('Done ✅');
})->purpose('Generate embeddings for chatbot knowledge docs');

Artisan::command('chatbot:search {query}', function (
    string $query,
    OpenAIService $openai,
    ChatbotRetrievalService $retrieval
) {
    $qVec = $openai->embed($query);

    $top = $retrieval->topDocs($qVec, 'en', 5);

    if (empty($top)) {
        $this->warn('No docs found.');
        return;
    }

    foreach ($top as $row) {
        $doc = $row['doc'];
        $this->line(sprintf(
            "[%0.4f] %s (%s)",
            $row['score'],
            $doc->title,
            $doc->key
        ));
    }
})->purpose('Search chatbot knowledge docs by similarity');


Artisan::command('chatbot:ask {message}', function (string $message, ChatbotService $bot) {
    $result = $bot->answer($message, 'en');

    $this->info("Best score: " . ($result['best_score'] ?? 'n/a'));
    $this->line("\nREPLY:\n" . $result['text']);

    $this->line("\nSOURCES:");
    foreach (($result['sources'] ?? []) as $s) {
        $title = $s['title'] ?? '';
        $key   = $s['key'] ?? '';
        $score = isset($s['score']) ? (string)$s['score'] : '';
        $this->line("- {$title} ({$key})" . ($score !== '' ? " score={$score}" : ""));
    }

})->purpose('Ask the chatbot using knowledge docs');

