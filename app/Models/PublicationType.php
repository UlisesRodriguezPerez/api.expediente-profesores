<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PublicationType extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $allowIncluded = ['publications'];

    protected $allowFilter = ['name', 'description'];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
