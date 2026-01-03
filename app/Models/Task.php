<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\TaskNote;
use App\Models\TaskResource;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'lesson_id',
        'title',
        'slug',
        'sort_order',
        'body',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function course()
    {
        // convenience relation: $task->course
        return $this->lesson->course();
    }

    public function completions()
    {
        return $this->hasMany(TaskCompletion::class);
    }

    public function notes()
    {
        return $this->hasMany(TaskNote::class);
    }

    public function resources()
    {
        return $this->hasMany(TaskResource::class)->orderBy('sort_order');
    }
    
}
