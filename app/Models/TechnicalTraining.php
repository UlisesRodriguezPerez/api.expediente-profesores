<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TechnicalTraining extends Model
{
    use HasFactory;
    use SoftDeletes;

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
