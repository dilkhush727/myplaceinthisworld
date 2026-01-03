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

        $session = ChatSession::findOrFail($data['session_id']);

        ChatMessage::create([
            'chat_session_id' => $session->id,
            'role' => 'user',
            'content' => $data['message'],
        ]);

        $lang = $session->language ?? 'en';
        $result = $bot->answer($data['message'], $lang);

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
