<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'schedule_id',
        'qr_code',
        'latitude',
        'longitude',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'latitude' => 'decimal:10,7',
        'longitude' => 'decimal:10,7',
    ];

    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class);
    }

    public function getTeacherAttribute()
    {
        return $this->schedule->teacher;
    }

    public function scopeValid($query)
    {
        return $query->where('expires_at', '>', Carbon::now());
    }

    public function isExpired(): bool
    {
        return $this->expires_at->isPast();
    }

    public function isValid(): bool
    {
        return !$this->isExpired();
    }
}