<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Period extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['creator_id', 'name', 'start_date', 'end_date'];

    protected $allowIncluded = ['creator', 'activities'];

    protected $allowFilter = ['name', 'start_date', 'end_date', 'creator_id'];

    public function creator()
    {
        return $this->belongsTo(Collaborator::class, 'creator_id');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }
}
