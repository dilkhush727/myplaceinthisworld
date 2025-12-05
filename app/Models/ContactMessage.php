<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'category',
        'message',
        'is_ticket',
        'ticket_number',
        'ticket_status',
        'user_id',
    ];

    protected $casts = [
        'is_ticket' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Any row flagged as a ticket
    public function scopeTickets($query)
    {
        return $query
            ->where('is_ticket', true)
            ->whereNotNull('ticket_number');
    }

    public function replies()
    {
        return $this->hasMany(TicketReply::class);
    }

    public function creator()   // optional – link to School/Teacher user
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
