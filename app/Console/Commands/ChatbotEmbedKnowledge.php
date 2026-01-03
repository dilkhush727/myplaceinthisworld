<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ChatKnowledgeDoc;
use App\Services\OpenAIService;

class ChatbotEmbedKnowledge extends Command
{
    protected $signature = 'chatbot:embed {--rebuild : Rebuild embeddings even if already set}';
    protected $description = 'Generate embeddings for chatbot knowledge docs';

    public function handle(OpenAIService $openai): int
    {
        $rebuild = (bool) $this->option('rebuild');

        $query = ChatKnowledgeDoc::query();
        if (!$rebuild) {
            $query->whereNull('embedding');
        }

        $docs = $query->orderBy('id')->get();

        if ($docs->isEmpty()) {
            $this->info('No docs to embed.');
            return self::SUCCESS;
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
        return self::SUCCESS;
    }
}
