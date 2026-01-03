<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatKnowledgeDoc extends Model
{
    protected $fillable = ['key', 'title', 'language', 'content', 'embedding'];

    protected $casts = [
        'embedding' => 'array',
    ];
}
