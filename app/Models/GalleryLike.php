<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GalleryLike extends Model
{
    use HasFactory;

    protected $fillable = [
        'gallery_id',
        'user_id',
        'ip_address',
    ];

    public function gallery()
    {
        return $this->belongsTo(Gallery::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(GalleryLike::class);
    }

    public function isLiked()
    {
        $ip = request()->ip();
        $userId = auth()->id();

        return $this->likes()
                ->where(function ($q) use ($ip, $userId) {
                    if ($userId) {
                        $q->where('user_id', $userId);
                    } else {
                        $q->where('ip_address', $ip);
                    }
                })
                ->exists();
    }
}
