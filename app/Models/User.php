<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\School;
use Spatie\Permission\Traits\HasRoles;

use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
        'school_id',
        'phone',
        'address',
        'designation',
        'level',
        'bio',
        'social_links',
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'social_links' => 'array',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function taskCompletions()
    {
        return $this->hasMany(\App\Models\TaskCompletion::class);
    }

    public function taskNotes()
    {
        return $this->hasMany(\App\Models\TaskNote::class);
    }

    // handy accessor for views (navbar + profile page)
    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo_path) {
            return asset('storage/' . $this->profile_photo_path);
        }

        // fallback (adjust if you want)
        return asset('assets/admin/images/user/avatar-2.jpg');
    }

    public function canAccessDivision(string $divisionKey): bool
    {
        if ($this->hasRole('admin')) return true;

        // ✅ PUT YOUR EXISTING LOGIC HERE
        // Example patterns (use the one that matches your project):
        // return $this->schoolMembership?->isActive() && $this->schoolMembership?->division === $divisionKey;
        // return $this->activeMembership?->hasDivision($divisionKey);
        // return $this->school?->activeMembership?->hasDivision($divisionKey);

        return false; // replace
    }

}
