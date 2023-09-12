<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['period_id', 'creator_id', 'involved_id', 'name'];

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
