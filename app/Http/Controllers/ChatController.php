<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ChatbotService;


class ChatController extends Controller
{

    public function __construct(private ChatbotService $chatbot)
{
}

public function index(Request $request)
{
    $conversation = null;

    if (Auth::check()) {
        $conversation = Conversation::where('user_id', Auth::id())->first();
    } else {
        $conversationId = $request->session()->get('conversation_id');

        if ($conversationId) {
            $conversation = Conversation::find($conversationId);
        }
    }

    $messages = $conversation
        ? $conversation->messages()->orderBy('created_at')->get()
        : collect();

    return view('chat', [
        'conversation' => $conversation,
        'messages' => $messages,
    ]);
}




    public function sendMessage(Request $request)
{
    $data = $request->validate([
        'message' => ['required', 'string', 'max:1000'],
        'language' => ['nullable', 'string', 'max:5'],
    ]);

    $language = $data['language'] ?? 'en';

    if (Auth::check()) {
        $conversation = Conversation::firstOrCreate(
            ['user_id' => Auth::id()],
            ['language' => $language]
        );

        if ($conversation->language !== $language) {
            $conversation->language = $language;
            $conversation->save();
        }
    } else {
        $conversationId = $request->session()->get('conversation_id');
        $conversation = null;

        if ($conversationId) {
            $conversation = Conversation::find($conversationId);
        }

        if (!$conversation) {
            $conversation = Conversation::create([
                'user_id' => null,
                'language' => $language,
            ]);

            $request->session()->put('conversation_id', $conversation->id);
        } elseif ($conversation->language !== $language) {
            $conversation->language = $language;
            $conversation->save();
        }
    }

    Message::create([
        'conversation_id' => $conversation->id,
        'sender_type' => 'user',
        'content' => $data['message'],
    ]);

$botReply = $this->chatbot->generateReply($conversation, $data['message']);


    Message::create([
        'conversation_id' => $conversation->id,
        'sender_type' => 'bot',
        'content' => $botReply,
    ]);

    return response()->json([
        'reply' => $botReply,
    ]);
}

}
