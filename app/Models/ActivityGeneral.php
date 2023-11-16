<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Builder;

class ActivityGeneral extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['name', 'hours'];

    protected $allowIncluded = ['collaborators', 'collaborators.user'];

    protected $allowFilter = ['name', 'hours'];

    public function collaborators()
    {
        return $this->morphedByMany(Collaborator::class, 'activitable', 'collaborator_activities')
            ->withPivot('period_id');
    }
}
