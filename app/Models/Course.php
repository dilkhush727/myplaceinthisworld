<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'division',
        'title',
        'slug',
        'summary',
        'image_path',
        'is_published',
        'estimated_minutes',
    ];

    protected $casts = [
        'is_published' => 'boolean',
    ];

    /*
     * Relationships
     */

    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('sort_order');
    }

    public function tasks()
    {
        // all tasks through lessons (if we need total count later)
        return $this->hasManyThrough(Task::class, Lesson::class);
    }

    /*
     * Scopes
     */

    // only published courses
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    // filter by division (primary / ji / highschool)
    public function scopeForDivision($query, string $division)
    {
        return $query->where('division', $division);
    }
}
