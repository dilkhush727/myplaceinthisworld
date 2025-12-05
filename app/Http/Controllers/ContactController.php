<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function showForm()
    {
        $categories = [
            'General Inquiry',
            'Technical Support',
            'Billing',
            'Membership',
            'Teacher Training',
            'Other',
        ];

        return view('contact', compact('categories'));
    }

    public function submit(Request $request)
    {
        // 1) Validate form
        $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'phone'     => ['nullable', 'string', 'max:50'],
            'email'     => ['required', 'email', 'max:255'],
            'category'  => ['required', 'string', 'max:255'],
            'message'   => ['required', 'string'],
            'g-recaptcha-response' => ['required', 'string'],
        ]);

        // 2) Verify Google reCAPTCHA
        $recaptchaSecret = config('services.recaptcha.secret_key');
        $response = Http::asForm()->post(
            'https://www.google.com/recaptcha/api/siteverify',
            [
                'secret'   => $recaptchaSecret,
                'response' => $request->input('g-recaptcha-response'),
                'remoteip' => $request->ip(),
            ]
        );

        $recaptchaData = $response->json();

        if (!($recaptchaData['success'] ?? false)) {
            return back()
                ->withErrors(['recaptcha' => 'reCAPTCHA verification failed. Please try again.'])
                ->withInput();
        }

        // 3) Determine if it's a ticket
        $isTicket = $request->boolean('is_ticket');

        $ticketNumber = null;
        $ticketStatus = null;

        if ($isTicket) {
            $ticketNumber = 'MP-' . now()->format('Ymd') . '-' . Str::upper(Str::random(6));
            $ticketStatus = 'open';
        }

        // 4) Save to DB
        $contact = ContactMessage::create([
            'name'          => $request->name,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'category'      => $request->category,
            'message'       => $request->message,
            'is_ticket'     => $isTicket,
            'ticket_number' => $ticketNumber,
            'ticket_status' => $ticketStatus,
            'user_id'       => auth()->id(),
        ]);

        // 5) Send plain-text emails (admin + user)

        $adminEmail = 'admin@myplace.ca';

        // Email to Admin
        Mail::raw(
            $this->buildAdminEmailBody($contact),
            function ($msg) use ($adminEmail) {
                $msg->to($adminEmail)
                    ->subject('New Contact Message from My Place');
            }
        );

        // Email to User (confirmation)
        Mail::raw(
            $this->buildUserEmailBody($contact),
            function ($msg) use ($contact) {
                $msg->to($contact->email)
                    ->subject('We received your message - My Place');
            }
        );

        return redirect()
            ->route('contact.show')
            ->with('success', $isTicket
                ? 'Your ticket has been submitted. We will get back to you soon.'
                : 'Your message has been sent. Thank you for contacting us.');
    }

    protected function buildAdminEmailBody(ContactMessage $contact): string
    {
        $lines = [
            "New contact submission from My Place:",
            "",
            "Name: {$contact->name}",
            "Phone: {$contact->phone}",
            "Email: {$contact->email}",
            "Category: {$contact->category}",
            "",
            "Submitted as ticket: " . ($contact->is_ticket ? 'YES' : 'NO'),
        ];

        if ($contact->is_ticket && $contact->ticket_number) {
            $lines[] = "Ticket Number: {$contact->ticket_number}";
            $lines[] = "Ticket Status: {$contact->ticket_status}";
        }

        $lines[] = "";
        $lines[] = "Message:";
        $lines[] = $contact->message;

        return implode("\n", $lines);
    }

    protected function buildUserEmailBody(ContactMessage $contact): string
    {
        $lines = [
            "Hello {$contact->name},",
            "",
            "Thank you for contacting My Place.",
        ];

        if ($contact->is_ticket && $contact->ticket_number) {
            $lines[] = "Your ticket has been created with the following number:";
            $lines[] = "Ticket Number: {$contact->ticket_number}";
            $lines[] = "";
        }

        $lines[] = "Here is a copy of your message:";
        $lines[] = "";
        $lines[] = "Category: {$contact->category}";
        $lines[] = "Message:";
        $lines[] = $contact->message;
        $lines[] = "";
        $lines[] = "We will get back to you as soon as possible.";
        $lines[] = "";
        $lines[] = "Kind regards,";
        $lines[] = "My Place Support Team";

        return implode("\n", $lines);
    }
}
