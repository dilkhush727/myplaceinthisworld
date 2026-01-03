<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskResource extends Model
{
    protected $fillable = [
        'task_id',
        'type',
        'title',
        'url',
        'sort_order',
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
