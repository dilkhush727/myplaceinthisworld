<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'category',
        'content',
        'tags',
        'status',
        'user_id',
        'school_id',
    ];

    protected $casts = [
        'tags' => 'array',
    ];

    // Relationships
    public function images()
    {
        return $this->hasMany(GalleryImage::class)->orderBy('sort_order');
    }

    public function likes()
    {
        return $this->hasMany(GalleryLike::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    // Helpers

    public function likeCount(): int
    {
        return $this->likes()->count();
    }

    public function isLikedBy(?User $user): bool
    {
        if (!$user) {
            return false;
        }

        return $this->likes()->where('user_id', $user->id)->exists();
    }

    // Automatically generate slug if not set
    protected static function booted()
    {
        static::creating(function (Gallery $gallery) {
            if (empty($gallery->slug)) {
                $gallery->slug = Str::slug($gallery->name . '-' . uniqid());
            }
        });
    }

    public function isLiked()
    {
        // If user is logged in → check user ID
        if (auth()->check()) {
            return $this->likes()
                ->where('user_id', auth()->id())
                ->exists();
        }

        // Else → check visitor IP
        return $this->likes()
            ->where('ip_address', request()->ip())
            ->exists();
    }
    

}
