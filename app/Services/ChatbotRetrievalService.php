<?php

namespace App\Services;

use App\Models\ChatKnowledgeDoc;

class ChatbotRetrievalService
{
    /**
     * Returns top K docs with similarity score.
     */
    public function topDocs(array $queryEmbedding, string $language = 'en', int $k = 5): array
    {
        $docs = ChatKnowledgeDoc::where('language', $language)
            ->whereNotNull('embedding')
            ->get(['id','key','title','language','content','embedding']);

        $scored = [];

        foreach ($docs as $doc) {
            $score = $this->cosineSimilarity($queryEmbedding, $doc->embedding ?? []);
            $scored[] = [
                'doc' => $doc,
                'score' => $score,
            ];
        }

        usort($scored, fn ($a, $b) => $b['score'] <=> $a['score']);

        return array_slice($scored, 0, $k);
    }

    private function cosineSimilarity(array $a, array $b): float
    {
        $n = min(count($a), count($b));
        if ($n === 0) return 0.0;

        $dot = 0.0;
        $na = 0.0;
        $nb = 0.0;

        for ($i = 0; $i < $n; $i++) {
            $x = (float) $a[$i];
            $y = (float) $b[$i];
            $dot += $x * $y;
            $na += $x * $x;
            $nb += $y * $y;
        }

        if ($na <= 0.0 || $nb <= 0.0) return 0.0;

        return $dot / (sqrt($na) * sqrt($nb));
    }
}
