<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internationalization extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['activity_id', 'activity_type_id', 'objective'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function activityType()
    {
        return $this->belongsTo(ActivityType::class);
    }
}
