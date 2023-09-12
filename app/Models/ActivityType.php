<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Builder;

class ActivityType extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['name', 'description'];

    protected $allowIncluded = ['internationalizations'];

    protected $allowFilter = ['name', 'description'];

    public function internationalizations()
    {
        return $this->hasMany(Internationalization::class);
    }

}
