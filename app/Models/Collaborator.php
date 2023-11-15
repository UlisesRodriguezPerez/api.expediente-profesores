<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Collaborator extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['user_id', 'position_id', 'category_id', 'appointment_id', 'degree_id', 'campus_id'];

    protected $allowIncluded = ['user', 'position', 'category', 'appointment', 'degree', 'campus', 
                                'periods', 'created_activities', 'involved_activities', 'publications', 
                                'work_units_and_additional_courses', 'workloads', 'workloads.period', 'workloads.period.activities'];

    protected $allowFilter = ['id', 'user_id', 'position_id', 'category_id', 'appointment_id', 'degree_id', 'campus_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function category()
    {
        return $this->belongsTo(TecCategory::class);
    }

    public function appointment()
    {
        return $this->belongsTo(AppointmentType::class, 'appointment_id');
    }

    public function degree()
    {
        return $this->belongsTo(AcademicDegree::class, 'degree_id');
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function createdActivities()
    {
        return $this->hasMany(Activity::class, 'creator_id');
    }

    public function involvedActivities()
    {
        return $this->hasMany(Activity::class, 'involved_id');
    }

    public function publications()
    {
        return $this->hasMany(Publication::class, 'collaborator_id');
    }

    public function workUnitsAndAdditionalCourses()
    {
        return $this->hasMany(WorkUnitsAndAdditionalCourse::class, 'collaborator_id');
    }

    public function workloads()
    {
        return $this->hasMany(Workload::class);
    }

    public function periods()
    {
        return $this->belongsToMany(Period::class, 'workloads')
                    ->withPivot('workload')
                    ->withTimestamps();
    }         
}
