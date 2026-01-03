<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'cours_id',
        'mark',
        'comment',
    ];

    protected $casts = [
        'mark' => 'decimal:5,2',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function cours(): BelongsTo
    {
        return $this->belongsTo(Cours::class);
    }

    public function getGradeAttribute(): string
    {
        if ($this->mark >= 16) return 'A';
        if ($this->mark >= 14) return 'B';
        if ($this->mark >= 12) return 'C';
        if ($this->mark >= 10) return 'D';
        return 'F';
    }

    public function isPassed(): bool
    {
        return $this->mark >= 10;
    }
}