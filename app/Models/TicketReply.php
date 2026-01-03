<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact_message_id',
        'user_id',
        'user_type',
        'message',
        'is_internal_note',
    ];

    public function ticket()
    {
        return $this->belongsTo(ContactMessage::class, 'contact_message_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function contactMessage() { return $this->belongsTo(\App\Models\ContactMessage::class, 'contact_message_id'); }
}
