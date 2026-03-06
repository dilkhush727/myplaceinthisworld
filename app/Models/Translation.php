<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $fillable = [
        'group',
        'locale',
        'source_text',
        'translated_text',
        'source_hash',
    ];
}
