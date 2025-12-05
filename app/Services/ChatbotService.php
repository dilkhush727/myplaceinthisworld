<?php

namespace App\Services;

use App\Models\Conversation;

class ChatbotService
{
    public function generateReply(Conversation $conversation, string $userMessage): string
    {
        $language = $conversation->language ?? 'en';

        if ($language === 'fr') {
            return "Bonjour ! Je suis une première version du chatbot IA. Mon cerveau complet est en cours de connexion.";
        }

        return "Hi! I am an early version of the AI chatbot. My full brain is still being connected.";
    }
}
