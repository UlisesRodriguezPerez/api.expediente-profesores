<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Builder;

class ActivityFormationTraining extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['name', 'university', 'academic_degree', 'start_year', 'end_year'];

    protected $allowIncluded = ['collaborators', 'collaborators.user'];

    protected $allowFilter = ['name', 'university', 'academic_degree', 'start_year', 'end_year'];

    public function collaborators()
    {
        return $this->morphedByMany(Collaborator::class, 'activitable', 'collaborator_activities')
                    ->withPivot('period_id');
    }

}
