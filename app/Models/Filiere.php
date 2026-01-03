<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Filiere extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'department_id',
        'name',
        'description',
        'chef_id',
    ];

    /**
     * Get the department that owns the filiere.
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Get the chef (teacher) who is the head of the filiere.
     */
    public function chef(): BelongsTo
    {
        return $this->belongsTo(User::class, 'chef_id');
    }

    /**
     * Get all students in this filiere.
     */
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }

    /**
     * Get all schedules for this filiere.
     */
    public function schedules(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * Get students by year.
     */
    public function studentsByYear(string $year): HasMany
    {
        return $this->hasMany(Student::class)->where('year', $year);
    }

    /**
     * Get schedules by year.
     */
    public function schedulesByYear(string $year): HasMany
    {
        return $this->hasMany(Schedule::class)->where('year', $year);
    }

    /**
     * Scope a query to filter by department.
     */
    public function scopeByDepartment($query, $departmentId)
    {
        return $query->where('department_id', $departmentId);
    }

    /**
     * Scope a query to filter by chef.
     */
    public function scopeByChef($query, $chefId)
    {
        return $query->where('chef_id', $chefId);
    }

    /**
     * Scope a query to search by name or description.
     */
    public function scopeSearch($query, $searchTerm)
    {
        return $query->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('description', 'LIKE', "%{$searchTerm}%");
    }
}