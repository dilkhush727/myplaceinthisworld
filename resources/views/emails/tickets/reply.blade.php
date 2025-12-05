@component('mail::message')
Hello {{ $ticket->name }},

This is a reply to your ticket **#{{ $ticket->ticket_number }}** ({{ $ticket->category }}).

---

{!! nl2br(e($reply->message)) !!}

---

If you have any further questions, you can reply to this email or submit a new ticket.

Thanks,<br>
{{ config('app.name') }} Support
@endcomponent
