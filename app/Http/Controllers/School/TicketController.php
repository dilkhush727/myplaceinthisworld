<?php

// app/Http/Controllers/School/TicketController.php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\TicketReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // List only this school’s tickets
    public function index(Request $request)
    {
        $query = ContactMessage::tickets()
            ->where('user_id', Auth::id())
            ->latest();

        if ($request->filled('status')) {
            $query->where('ticket_status', $request->status);
        }

        $tickets = $query->paginate(10)->withQueryString();

        return view('school.tickets.index', compact('tickets'));
    }

    // Show one ticket + its replies
    public function show(ContactMessage $ticket)
    {
        // Security: ensure it belongs to this school
        abort_unless($ticket->user_id === Auth::id(), 403);

        $ticket->load('replies');

        return view('school.tickets.show', compact('ticket'));
    }

    // School reply
    public function reply(Request $request, ContactMessage $ticket)
    {
        abort_unless($ticket->user_id === Auth::id(), 403);

        $data = $request->validate([
            'message' => 'required|string',
        ]);

        TicketReply::create([
            'contact_message_id' => $ticket->id,
            'user_id'            => Auth::id(),
            'user_type'          => 'school', // or 'teacher' in teacher controller
            'message'            => $data['message'],
        ]);

        // Reopen ticket if it was closed
        if ($ticket->ticket_status === 'closed') {
            $ticket->ticket_status = 'open';
            $ticket->save();
        }

        // (Optional) send email notification to admin about new reply

        return redirect()
            ->route('school.tickets.show', $ticket)
            ->with('success', 'Your reply has been sent.');
    }
}
