<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnicalTraining extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['training_type_id', 'hours', 'objective'];

    protected $allowIncluded = ['training_type', 'collaborators', 'collaborators.user'];

    protected $allowFilter = ['objective', 'training_type_id', 'hours'];

    // public function activity()
    // {
    //     return $this->belongsTo(Activity::class);
    // }

    public function trainingType()
    {
        return $this->belongsTo(TrainingType::class);
    }

    public function collaborators()
    {
        return $this->morphedByMany(Collaborator::class, 'activitable', 'collaborator_activities')
                    ->withPivot('period_id');
    }
}
