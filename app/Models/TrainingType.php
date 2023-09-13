<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrainingType extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = [
        'name',
        'description'
    ];

    protected $allowIncluded = ['technical_trainings'];

    protected $allowFilter = ['name', 'description'];

    public function technicalTrainings()
    {
        return $this->hasMany(TechnicalTraining::class);
    }
}
