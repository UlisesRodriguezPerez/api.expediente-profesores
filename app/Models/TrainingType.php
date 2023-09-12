<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public function technicalTrainings()
    {
        return $this->hasMany(TechnicalTraining::class);
    }
}
