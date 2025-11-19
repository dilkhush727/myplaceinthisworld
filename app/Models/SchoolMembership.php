<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolMembership extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'type',
        'billing_period',
        'is_free',
        'status',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public const TYPE_HIGHSCHOOL = 'highschool';
    public const TYPE_PRIMARY = 'primary';
    public const TYPE_JI = 'ji';

    public const STATUS_ACTIVE = 'active';
    public const STATUS_EXPIRED = 'expired';
    public const STATUS_CANCELLED = 'cancelled';

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function isActive(): bool
    {
        if ($this->status !== self::STATUS_ACTIVE) {
            return false;
        }

        if ($this->ends_at && now()->greaterThan($this->ends_at)) {
            return false;
        }

        return true;
    }
}
