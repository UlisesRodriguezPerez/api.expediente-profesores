<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalTraining extends Model
{
    use HasFactory;

    protected $fillable = ['activity_id', 'training_type_id', 'hours', 'objective'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    public function trainingType()
    {
        return $this->belongsTo(TrainingType::class);
    }
}
