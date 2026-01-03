<?php

namespace App\Services;

use App\Models\ChatKnowledgeDoc;

class ChatbotService
{
    public function __construct(
        private OpenAIService $openai,
        private ChatbotRetrievalService $retrieval
    ) {}

    public function answer(string $userMessage, string $language = 'en'): array
    {
        $language = $language ?: 'en';

        $persona = ChatKnowledgeDoc::where('key', "persona_rules_{$language}")->first();

        $isDirect   = $this->isDirectRequest($userMessage);
        $isGreeting = $this->isGreetingOrOnboarding($userMessage);

        // 1) Greeting: use persona onboarding behavior
        if ($isGreeting) {
            return $this->genericReply($userMessage, $language, $persona, mode: 'ONBOARDING');
        }

        // 2) RAG attempt
        $qVec = $this->openai->embed($userMessage);
        $top = $this->retrieval->topDocs($qVec, $language, 5);
        $bestScore = $top[0]['score'] ?? 0.0;

        $threshold = 0.30;

        // 3) If no strong match => GENERAL KNOWLEDGE MODE for ANY question
        if ($bestScore < $threshold) {
            return $this->genericReply($userMessage, $language, $persona, mode: 'GENERAL_KNOWLEDGE');
        }

        // 4) If strong match => answer from docs only (RAG mode)
        $context = [];
        $sources = [];

        if ($persona) {
            $context[] = "### Persona Rules\n" . $persona->content;
            $sources[] = ['key' => $persona->key, 'title' => $persona->title, 'score' => null];
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
            "- If the user asks something not supported by CONTEXT, say you can’t verify it and offer general help OR direct them to Contact Us.",
            "- Do NOT guess details about this website, memberships, pricing, or specific activities unless they are explicitly present in CONTEXT.",
            "- Keep tone warm, friendly, informal, and educational.",
            "- Keep responses short (20–40 words) unless more explanation is clearly needed.",
            "- If this is the FIRST message and DirectRequest=false, start by asking: how they are doing, what support they need, and English/French preference.",
            "- If DirectRequest=true, answer the request immediately (still warm tone).",
            "",
            "CONTEXT:",
            implode("\n\n---\n\n", $context),
        ]);

        $input = "DirectRequest=" . ($isDirect ? "true" : "false") . "\nUserMessage: " . $userMessage;

        $reply = $this->openai->respond($instructions, $input, 450);

        return [
            'text' => $reply,
            'sources' => $sources,
            'best_score' => $bestScore,
            'mode' => 'RAG',
        ];
    }

    /**
     * General knowledge mode for anything (when no RAG match).
     * Still avoids inventing website-specific facts.
     */
    private function genericReply(string $userMessage, string $language, ?ChatKnowledgeDoc $persona, string $mode = 'GENERAL_KNOWLEDGE'): array
    {
        $isDirect = $this->isDirectRequest($userMessage);

        $context = [];
        $sources = [];

        if ($persona) {
            $context[] = "### Persona Rules\n" . $persona->content;
            $sources[] = ['key' => $persona->key, 'title' => $persona->title, 'score' => null];
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
            "- If this is the FIRST message and DirectRequest=false, ask: how they are doing, what support they need, and English/French preference.",
            "",
            "CONTEXT (may be empty):",
            implode("\n\n---\n\n", $context),
        ]);

        $input = "DirectRequest=" . ($isDirect ? "true" : "false") . "\nUserMessage: " . $userMessage;

        $reply = $this->openai->respond($instructions, $input, 350);

        return [
            'text' => $reply,
            'sources' => $sources,
            'best_score' => null,
            'mode' => $mode,
        ];
    }

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

        if (str_ends_with($m, '?')) return true;

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
