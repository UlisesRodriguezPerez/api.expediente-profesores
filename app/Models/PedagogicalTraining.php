<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedagogicalTraining extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = [ 'hours', 'objective'];

    protected $allowIncluded = ['collaborators', 'collaborators.user'];

    protected $allowFilter = ['hours', 'objective'];

    // public function activity()
    // {
    //     return $this->belongsTo(Activity::class);
    // }

    public function collaborators()
    {
        return $this->morphedByMany(Collaborator::class, 'activitable', 'collaborator_activities')
                    ->withPivot('period_id');
    }
}
