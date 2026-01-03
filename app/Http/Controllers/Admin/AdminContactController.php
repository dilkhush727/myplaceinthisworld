<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminContactController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status'); // open|closed|resolved|null

        $contacts = ContactMessage::query()
            ->where('is_ticket', 0) // only "contact us" (not tickets)
            ->when($status, function ($q) use ($status) {
                if ($status === 'open') {
                    // treat NULL as open
                    $q->where(function($qq){
                        $qq->whereNull('ticket_status')
                           ->orWhere('ticket_status', 'open');
                    });
                } else {
                    $q->where('ticket_status', $status);
                }
            })
            ->latest('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.contacts.index', compact('contacts', 'status'));
    }

    public function show(ContactMessage $contactMessage)
    {
        return view('admin.contacts.show', compact('contactMessage'));
    }

    public function updateStatus(Request $request, ContactMessage $contactMessage)
    {
        $request->validate([
            'ticket_status' => 'required|in:open,resolved,closed',
        ]);

        $contactMessage->update([
            'ticket_status' => $request->ticket_status,
        ]);

        return back()->with('success', 'Contact status updated.');
    }
}
