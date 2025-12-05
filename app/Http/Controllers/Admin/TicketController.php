<?php

// app/Http/Controllers/Admin/TicketController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\TicketReply;
use App\Mail\TicketReplyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    // List tickets with filters
    public function index(Request $request)
    {
        $query = ContactMessage::tickets()->latest();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        if ($request->filled('status')) {
            $query->where('ticket_status', $request->status);   // 👈 column name
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('ticket_number', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('name', 'like', "%{$search}%");
            });
        }

        $tickets = $query->paginate(15)->withQueryString();

        $categories = [
            'General Inquiry',
            'Technical Support',
            'Billing',
            'Membership',
            'Teacher Training',
            'Other',
        ];

        return view('admin.tickets.index', compact('tickets', 'categories'));
    }

    // Show single ticket with replies
    public function show(ContactMessage $ticket)
    {
        $ticket->load('replies');

        return view('admin.tickets.show', compact('ticket'));
    }

    // Store admin reply + email user
    public function reply(Request $request, ContactMessage $ticket)
    {
        $data = $request->validate([
            'message' => 'required|string',
            'close_after_reply' => 'nullable|boolean',
        ]);

        $reply = TicketReply::create([
            'contact_message_id' => $ticket->id,
            'user_id'            => Auth::id(),
            'user_type'          => 'admin',
            'message'            => $data['message'],
        ]);

        // reopen if closed
        if ($ticket->ticket_status === 'closed') {
            $ticket->ticket_status = 'open';
        }

        // close right after reply, if requested
        if ($request->boolean('close_after_reply')) {
            $ticket->ticket_status = 'closed';
        }

        $ticket->save();

        Mail::to($ticket->email)->send(new TicketReplyMail($ticket, $reply));

        return redirect()
            ->route('admin.tickets.show', $ticket)
            ->with('success', 'Reply sent successfully.');
    }

    // Change ticket status
    public function updateStatus(Request $request, ContactMessage $ticket)
    {
        $data = $request->validate([
            'status' => 'required|in:open,closed',
        ]);

        $ticket->ticket_status = $data['status'];
        $ticket->save();

        return redirect()
            ->route('admin.tickets.show', $ticket)
            ->with('success', 'Ticket status updated.');
    }
}
