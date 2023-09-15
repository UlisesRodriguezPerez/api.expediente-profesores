<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PedagogicalTraining extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['activity_id', 'hours', 'objective'];

    protected $allowIncluded = ['activity'];

    protected $allowFilter = ['hours', 'objective', 'activity_id'];

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}
