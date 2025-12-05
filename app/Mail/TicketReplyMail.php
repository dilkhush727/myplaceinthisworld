<?php

// app/Mail/TicketReplyMail.php

namespace App\Mail;

use App\Models\ContactMessage;
use App\Models\TicketReply;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public ContactMessage $ticket;
    public TicketReply $reply;

    public function __construct(ContactMessage $ticket, TicketReply $reply)
    {
        $this->ticket = $ticket;
        $this->reply  = $reply;
    }

    public function build()
    {
        return $this->subject('Reply to your ticket #'.$this->ticket->ticket_number)
            ->markdown('emails.tickets.reply');
    }
}
