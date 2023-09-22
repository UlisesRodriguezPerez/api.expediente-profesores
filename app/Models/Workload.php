<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Workload extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['collaborator_id', 'period_id', 'workload'];

    protected $allowIncluded = ['collaborator', 'period', 'collaborator.user', 'period.creator', 'period.creator.user'];

    protected $allowFilter = ['collaborator_id', 'period_id', 'workload', 'collaborator.user.name', 'collaborator.user.last_name', 'collaborator.user.second_last_name'];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

}
