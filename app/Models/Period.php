<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['creator_id', 'name', 'start_date', 'end_date'];

    protected $allowIncluded = ['creator', 'activities', 'workloads', 'collaborators', 'collaborators.user', 'courses', 'courses.collaborators', 'courses.collaborators.user'];

    protected $allowFilter = ['name', 'start_date', 'end_date', 'creator_id'];

    public function creator()
    {
        return $this->belongsTo(Collaborator::class, 'creator_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function workloads()
    {
        return $this->hasMany(Workload::class);
    }

    public function collaboratorsThroughWorkloads()
    {
        return $this->belongsToMany(Collaborator::class, 'workloads')
            ->withPivot('workload')
            ->withTimestamps();
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'collaborator_course_period')
            ->withPivot('collaborator_id')
            ->withTimestamps();
    }

    public function collaboratorsThroughCourses()
    {
        return $this->belongsToMany(Collaborator::class, 'collaborator_course_period')
            ->withPivot('course_id')
            ->withTimestamps();
    }
}
