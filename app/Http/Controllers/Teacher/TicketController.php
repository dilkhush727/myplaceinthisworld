<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * List tickets that belong to the logged-in teacher.
     */
    public function index(Request $request)
    {
        $query = ContactMessage::tickets()
            ->where('user_id', Auth::id())
            ->latest();

        if ($request->filled('status')) {
            $query->where('ticket_status', $request->status);
        }

        $tickets = $query->paginate(10)->withQueryString();

        return view('teacher.tickets.index', compact('tickets'));
    }

    /**
     * Show one ticket + its replies.
     */
    public function show(ContactMessage $ticket)
    {
        // Make sure this ticket belongs to this teacher
        abort_unless($ticket->user_id === Auth::id(), 403);

        $ticket->load('replies');

        return view('teacher.tickets.show', compact('ticket'));
    }

    /**
     * Store a reply from the teacher.
     */
    public function reply(Request $request, ContactMessage $ticket)
    {
        abort_unless($ticket->user_id === Auth::id(), 403);

        $data = $request->validate([
            'message' => 'required|string',
        ]);

        TicketReply::create([
            'contact_message_id' => $ticket->id,
            'user_id'            => Auth::id(),
            'user_type'          => 'teacher',   // 👈 important difference from School
            'message'            => $data['message'],
        ]);

        // If admin had closed it, reopen on teacher reply
        if ($ticket->ticket_status === 'closed') {
            $ticket->ticket_status = 'open';
            $ticket->save();
        }

        // (Optional) TODO: email admin about new teacher reply

        return redirect()
            ->route('teacher.tickets.show', $ticket)
            ->with('success', 'Your reply has been sent.');
    }
}
