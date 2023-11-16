<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['name', 'code'];

    protected $allowIncluded = ['collaborators', 'periods', 'collaborators.user']; 

    protected $allowFilter = ['id', 'name', 'code',];

    public function collaborators()
    {
        return $this->belongsToMany(Collaborator::class, 'collaborator_course_period')
            ->withPivot('period_id')
            ->withTimestamps();
    }

    public function periods()
    {
        return $this->belongsToMany(Period::class, 'collaborator_course_period')
            ->withPivot('collaborator_id')
            ->withTimestamps();
    }
}
