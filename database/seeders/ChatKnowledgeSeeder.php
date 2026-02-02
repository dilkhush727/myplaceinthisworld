<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\ChatKnowledgeDoc;

class ChatKnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $lang = 'en';
        $dir = storage_path("app/chatbot/knowledge/{$lang}");

        if (!File::exists($dir)) {
            return;
        }

        $files = File::files($dir);

        foreach ($files as $file) {
            $filename = $file->getFilename();              // e.g. persona_rules.md
            $nameOnly = pathinfo($filename, PATHINFO_FILENAME); // persona_rules
            $content = trim(File::get($file->getRealPath()));

            // Special handling: activities.md => split into chunks
            if ($filename === 'activities.md') {
                $parts = array_filter(array_map('trim', explode('---ACTIVITY---', $content)));

                foreach ($parts as $i => $chunk) {
                    preg_match('/^#\s*(.+)$/m', $chunk, $m);
                    $title = $m[1] ?? ('Activity ' . ($i + 1));

                    $key = 'hs_activity_' . str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) . "_{$lang}";

                    ChatKnowledgeDoc::updateOrCreate(
                        ['key' => $key],
                        [
                            'title' => $title,
                            'language' => $lang,
                            'content' => trim($chunk),
                            'embedding' => null,
                        ]
                    );
                }

                continue;
            }

            // Default handling: each .md file becomes one doc
            $key = "{$nameOnly}_{$lang}";
            $title = ucwords(str_replace('_', ' ', $nameOnly));

            ChatKnowledgeDoc::updateOrCreate(
                ['key' => $key],
                [
                    'title' => $title,
                    'language' => $lang,
                    'content' => $content,
                    'embedding' => null,
                ]
            );
        }
    }
}
