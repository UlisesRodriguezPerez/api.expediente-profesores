<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internationalization extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['activity_id', 'activity_type_id', 'objective'];

    protected $allowIncluded = ['activity', 'activity_type'];

    protected $allowFilter = ['objective', 'activity_id', 'activity_type_id'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }
}
