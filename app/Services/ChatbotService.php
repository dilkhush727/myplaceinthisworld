<?php

namespace App\Services;

use App\Models\ChatKnowledgeDoc;

class ChatbotService
{
    public function __construct(
        private OpenAIService $openai,
        private ChatbotRetrievalService $retrieval
    ) {}

    public function answer(
        string $userMessage,
        string $language = 'en',
        ?string $topicMessage = null,
        ?string $previousAssistant = null,
        bool $isContinuation = false
    ): array
    {
        $language = $language ?: 'en';

        $persona = ChatKnowledgeDoc::where('key', "persona_rules_{$language}")->first();

        // Treat continuation as direct (so we respond immediately)
        $isDirect = $this->isDirectRequest($userMessage) || $isContinuation;

        // ✅ Use last meaningful topic for retrieval when user says "yes more details"
        $retrievalQuery = ($isContinuation && $topicMessage) ? $topicMessage : $userMessage;

        // 1) RAG attempt
        $qVec = $this->openai->embed($retrievalQuery);
        $top = $this->retrieval->topDocs($qVec, $language, 5);
        $bestScore = $top[0]['score'] ?? 0.0;

        $threshold = 0.30;

        // ✅ If this is a continuation but retrieval is weak, still expand previous assistant message
        if ($isContinuation && $previousAssistant && $bestScore < $threshold) {
            return $this->genericReply(
                userMessage: $userMessage,
                language: $language,
                persona: $persona,
                mode: 'CONTINUATION',
                topicMessage: $topicMessage,
                previousAssistant: $previousAssistant,
                isContinuation: true
            );
        }

        // 2) If no strong match => GENERAL KNOWLEDGE MODE
        if ($bestScore < $threshold) {
            return $this->genericReply(
                userMessage: $userMessage,
                language: $language,
                persona: $persona,
                mode: 'GENERAL_KNOWLEDGE',
                topicMessage: $topicMessage,
                previousAssistant: $previousAssistant,
                isContinuation: $isContinuation
            );
        }

        // 3) Strong match => answer from docs (RAG mode)
        $context = [];
        $sources = [];

        if ($persona) {
            $context[] = "### Persona Rules\n" . $persona->content;
            $sources[] = ['key' => $persona->key, 'title' => $persona->title, 'score' => null];
        }

        // ✅ Continuation anti-repeat guard (VERY IMPORTANT)
        if ($isContinuation && $previousAssistant) {
            $context[] =
                "### Previous Assistant Message (DO NOT REPEAT VERBATIM)\n"
                . $previousAssistant
                . "\n\n"
                . "RULES FOR CONTINUATION:\n"
                . "- Do NOT restate the same activity title/summary again.\n"
                . "- Add NEW details only (next layer): grade suggestion, learning goals, steps, assessment idea, materials/resources.\n"
                . "- Keep it concise.\n";
        }

        foreach ($top as $row) {
            $doc = $row['doc'];
            $score = $row['score'];
            $context[] = "### {$doc->title}\n{$doc->content}";
            $sources[] = ['key' => $doc->key, 'title' => $doc->title, 'score' => round($score, 4)];
        }

        $instructions = implode("\n\n", [
            "You are the My Place In This World website chatbot.",
            "MODE: RAG_ONLY",
            "STRICT RULES:",
            "- Answer ONLY using the provided CONTEXT.",
            "- If the user asks something not supported by CONTEXT, say you can’t verify it and direct them to Contact Us.",
            "- Do NOT guess details about this website, memberships, pricing, or specific activities unless explicitly present in CONTEXT.",
            "- Keep tone warm, friendly, informal, and educational.",
            "- Keep responses short (20–40 words) unless more explanation is clearly needed.",
            "- If DirectRequest=true, answer the request immediately (still warm tone).",
            "- If IsContinuation=true (e.g., 'yes', 'more details', 'tell me more', 'continue'):",
            "  * DO NOT ask a clarifying question.",
            "  * DO NOT repeat the previous response.",
            "  * Expand with NEW details only (grade level suggestion, steps, materials, assessment, learning outcomes) based on CONTEXT.",
            "",
            "CONTEXT:",
            implode("\n\n---\n\n", $context),
        ]);

        $input = implode("\n", array_filter([
            "DirectRequest=" . ($isDirect ? "true" : "false"),
            "IsContinuation=" . ($isContinuation ? "true" : "false"),
            $topicMessage ? "TopicMessage: " . $topicMessage : null,
            "UserMessage: " . $userMessage,
        ]));

        $reply = $this->openai->respond($instructions, $input, 450);

        return [
            'text' => $reply,
            'sources' => $sources,
            'best_score' => $bestScore,
            'mode' => 'RAG',
        ];
    }

    /**
     * General knowledge / continuation mode.
     * Still avoids inventing website-specific facts unless present in CONTEXT.
     */
    private function genericReply(
        string $userMessage,
        string $language,
        ?ChatKnowledgeDoc $persona,
        string $mode = 'GENERAL_KNOWLEDGE',
        ?string $topicMessage = null,
        ?string $previousAssistant = null,
        bool $isContinuation = false
    ): array
    {
        $isDirect = $this->isDirectRequest($userMessage) || $isContinuation;

        $context = [];
        $sources = [];

        if ($persona) {
            $context[] = "### Persona Rules\n" . $persona->content;
            $sources[] = ['key' => $persona->key, 'title' => $persona->title, 'score' => null];
        }

        if ($isContinuation && $previousAssistant) {
            $context[] =
                "### Previous Assistant Message (DO NOT REPEAT VERBATIM)\n"
                . $previousAssistant
                . "\n\n"
                . "RULES FOR CONTINUATION:\n"
                . "- Do NOT restate the same title/summary again.\n"
                . "- Add NEW details only.\n";
        }

        $instructions = implode("\n\n", [
            "You are the My Place In This World website chatbot.",
            "MODE: {$mode}",
            "RULES:",
            "- You may answer general knowledge questions normally.",
            "- IMPORTANT: Do NOT claim specific facts about THIS website, memberships, pricing, accounts, or specific activities unless explicitly present in CONTEXT.",
            "- If the user asks something about the website and you can’t verify it from CONTEXT, tell them to use Contact Us / Support Ticket / lorraine@myplaceinthisworld.ca / +1 519-222-7714.",
            "- Keep tone warm, informal, and educational.",
            "- Keep responses short (20–40 words) unless more explanation is clearly needed.",
            "- Ask no more than two questions in a row before offering help.",
            "- If IsContinuation=true:",
            "  * DO NOT ask what they mean.",
            "  * DO NOT repeat the previous assistant message.",
            "  * Continue by adding NEW helpful details (steps, outcomes, materials, assessment).",
            "",
            "CONTEXT (may be empty):",
            implode("\n\n---\n\n", $context),
        ]);

        $input = implode("\n", array_filter([
            "DirectRequest=" . ($isDirect ? "true" : "false"),
            "IsContinuation=" . ($isContinuation ? "true" : "false"),
            $topicMessage ? "TopicMessage: " . $topicMessage : null,
            "UserMessage: " . $userMessage,
        ]));

        $reply = $this->openai->respond($instructions, $input, 350);

        return [
            'text' => $reply,
            'sources' => $sources,
            'best_score' => null,
            'mode' => $mode,
        ];
    }

    // (Not used right now, but kept)
    private function isGreetingOrOnboarding(string $msg): bool
    {
        $m = trim(mb_strtolower($msg));
        if ($m === '') return true;

        $greetings = [
            'hi','hello','hey','yo','hiya','good morning','good afternoon','good evening',
            'how are you','how r u','hru','sup','wassup'
        ];

        if (in_array($m, $greetings, true)) return true;

        if (mb_strlen($m) <= 12) {
            foreach (['hi','hello','hey'] as $g) {
                if (str_starts_with($m, $g)) return true;
            }
        }

        return false;
    }

    private function isDirectRequest(string $msg): bool
    {
        $m = trim(mb_strtolower($msg));
        if ($m === '') return false;

        // Question mark = direct
        if (str_ends_with($m, '?')) return true;

        // Continuation / confirmation phrases (treated as direct)
        $continuations = [
            'yes','yes please','yep','yeah','sure','ok','okay',
            'more','more details','yes more details',
            'tell me more','more info','more information',
            'go on','continue','please continue','keep going'
        ];

        if (in_array($m, $continuations, true)) {
            return true;
        }

        // Direct starters
        $starters = [
            'tell me','explain','what is','what are','how do','how to',
            'help me','give me','show me','can you','i need','i want',
            'who is','who are'
        ];

        foreach ($starters as $s) {
            if (str_starts_with($m, $s)) return true;
        }

        return false;
    }

    private function fallback(string $language): string
    {
        if ($language === 'fr') {
            return "Je ne peux pas vérifier ça avec les infos disponibles. Utilise « Contact Us » / Support Ticket, ou écris à lorraine@myplaceinthisworld.ca (tél: +1 519-222-7714).";
        }

        return "I can’t verify that from the info I’m allowed to use. Please use Contact Us / the Support Ticket form, or email lorraine@myplaceinthisworld.ca (Phone: +1 519-222-7714).";
    }
}
