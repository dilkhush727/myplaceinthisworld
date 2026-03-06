<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ChatSession;
use App\Models\ChatMessage;
use App\Services\ChatbotService;
use Illuminate\Support\Facades\Auth;

class ChatbotController extends Controller
{
    public function createSession(Request $request)
    {
        $session = ChatSession::create([
            'id' => (string) Str::uuid(),
            'user_id' => Auth::id(),
            'language' => null,
            'last_activity_at' => now(),
        ]);

        return response()->json([
            'session_id' => $session->id,
        ]);
    }

    public function sendMessage(Request $request, ChatbotService $bot)
    {
        $data = $request->validate([
            'session_id' => ['required', 'uuid', 'exists:chat_sessions,id'],
            'message' => ['required', 'string', 'max:4000'],
        ]);

        $session = ChatSession::query()
            ->where('id', $data['session_id'])
            ->firstOrFail();

        $msg = trim($data['message']);

        // Save user message
        ChatMessage::create([
            'chat_session_id' => $session->id,
            'role' => 'user',
            'content' => $msg,
        ]);

        // ✅ FIRST MESSAGE CHECK (ask language once per new session)
        $messageCount = ChatMessage::where('chat_session_id', $session->id)->count();
        $isFirstMessage = ($messageCount === 1);

        // ✅ LANGUAGE GATE (ask ONCE, bilingual)
        if (is_null($session->language) && $isFirstMessage) {
            $normalized = trim(mb_strtolower($msg));

            if (in_array($normalized, ['english', 'en', 'eng'], true)) {
                $session->update(['language' => 'en', 'last_activity_at' => now()]);
                $reply = "Perfect 😊 English it is. How can I support you today?";
            } elseif (in_array($normalized, ['french', 'fr', 'français', 'francais'], true)) {
                $session->update(['language' => 'fr', 'last_activity_at' => now()]);
                $reply = "Parfait 😊 Français. Comment puis-je vous aider aujourd’hui ?";
            } else {
                $session->update(['last_activity_at' => now()]);
                $reply = "Hi there! 😊

What’s your preferred language?
English or French?

Quelle est votre langue préférée ?
Anglais ou français ?

Please reply with: English / French (EN / FR)";
            }

            ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'assistant',
                'content' => $reply,
            ]);

            return response()->json(['reply' => $reply, 'sources' => []]);
        }

        // ✅ Keep asking until they choose (if they ignored language question)
        if (is_null($session->language)) {
            $normalized = trim(mb_strtolower($msg));

            if (in_array($normalized, ['english', 'en', 'eng'], true)) {
                $session->update(['language' => 'en', 'last_activity_at' => now()]);
                $reply = "Perfect 😊 English it is. How can I support you today?";
            } elseif (in_array($normalized, ['french', 'fr', 'français', 'francais'], true)) {
                $session->update(['language' => 'fr', 'last_activity_at' => now()]);
                $reply = "Parfait 😊 Français. Comment puis-je vous aider aujourd’hui ?";
            } else {
                $session->update(['last_activity_at' => now()]);
                $reply = "Please choose a language first:
English or French?
Anglais ou français ?";
            }

            ChatMessage::create([
                'chat_session_id' => $session->id,
                'role' => 'assistant',
                'content' => $reply,
            ]);

            return response()->json(['reply' => $reply, 'sources' => []]);
        }

        // ✅ Continuation detection (so “yes more details” expands the last topic)
        $normalized = trim(mb_strtolower($msg));

        $continuations = [
            'yes','yes please','yep','yeah','sure','ok','okay',
            'more','more details','yes more details',
            'tell me more','more info','more information',
            'go on','continue','please continue','keep going'
        ];

        $isContinuation = in_array($normalized, $continuations, true);

        $topicMessage = null;
        $previousAssistant = null;

        if ($isContinuation) {
            // last assistant message (what we should expand)
            $previousAssistant = ChatMessage::where('chat_session_id', $session->id)
                ->where('role', 'assistant')
                ->orderByDesc('created_at')
                ->value('content');

            // ✅ last meaningful user message (filter continuations safely in PHP)
            $recentUserMessages = ChatMessage::where('chat_session_id', $session->id)
                ->where('role', 'user')
                ->orderByDesc('created_at')
                ->limit(15)
                ->pluck('content');

            foreach ($recentUserMessages as $candidate) {
                $c = trim(mb_strtolower((string) $candidate));
                if ($c === '') continue;
                if (!in_array($c, $continuations, true)) {
                    $topicMessage = (string) $candidate;
                    break;
                }
            }
        }

        $lang = $session->language; // 'en' or 'fr'

        // ✅ Pass continuation context to the service
        $result = $bot->answer(
            $msg,
            $lang,
            $topicMessage,
            $previousAssistant,
            $isContinuation
        );

        ChatMessage::create([
            'chat_session_id' => $session->id,
            'role' => 'assistant',
            'content' => $result['text'],
            'sources' => $result['sources'] ?? null,
        ]);

        $session->update(['last_activity_at' => now()]);

        return response()->json([
            'reply' => $result['text'],
            'sources' => $result['sources'] ?? [],
        ]);
    }
}
