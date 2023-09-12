<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedagogicalTraining extends Model
{
    use HasFactory;

    protected $fillable = ['activity_id', 'hours', 'objective'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
