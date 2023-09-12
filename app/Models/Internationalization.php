<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internationalization extends Model
{
    use HasFactory;

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
