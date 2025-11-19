<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolMembership;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'board',
        'address',
        'city',
        'province',
        'postal_code',
        'phone',
    ];

    /**
     * A school has many memberships.
     */
    public function memberships()
    {
        return $this->hasMany(SchoolMembership::class);
    }

    /**
     * Only active memberships (not expired or cancelled).
     */
    public function activeMemberships()
    {
        return $this->memberships()
            ->where('status', SchoolMembership::STATUS_ACTIVE)
            ->where(function ($q) {
                $q->whereNull('ends_at')
                  ->orWhere('ends_at', '>', now());
            });
    }

    /**
     * Check if the school has an active membership for a specific type.
     *
     * Example:
     * $school->hasActiveMembership('primary');
     * $school->hasActiveMembership(SchoolMembership::TYPE_JI);
     */
    public function hasActiveMembership(string $type): bool
    {
        return $this->activeMemberships()->where('type', $type)->exists();
    }
}
