<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'position_id', 'category_id', 'appointment_id', 'degree_id', 'campus_id'];

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

    public function periods()
    {
        return $this->hasMany(Period::class, 'creator_id');
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
}
