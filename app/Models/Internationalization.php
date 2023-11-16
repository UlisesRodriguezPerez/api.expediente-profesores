<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internationalization extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['activity_type_id', 'objective'];

    protected $allowIncluded = ['activity_type', 'collaborators', 'collaborators.user'];

    protected $allowFilter = ['objective', 'activity_type_id'];

    // public function activity()
    // {
    //     return $this->belongsTo(Activity::class);
    // }

    public function collaborators()
    {
        return $this->morphedByMany(Collaborator::class, 'activitable', 'collaborator_activities')
                    ->withPivot('period_id');
    }

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }
}
