<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['period_id', 'creator_id', 'involved_id', 'name'];

    protected $allowIncluded = ['period', 'creator', 'involved', 'internationalization', 'technical_training', 'pedagogical_training'];

    protected $allowFilter = ['name'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function creator()
    {
        return $this->belongsTo(Collaborator::class, 'creator_id');
    }

    public function involved()
    {
        return $this->belongsTo(Collaborator::class, 'involved_id');
    }

    public function internationalization()
    {
        return $this->hasOne(Internationalization::class);
    }

    public function technicalTraining()
    {
        return $this->hasOne(TechnicalTraining::class);
    }

    public function pedagogicalTraining()
    {
        return $this->hasOne(PedagogicalTraining::class);
    }
}
