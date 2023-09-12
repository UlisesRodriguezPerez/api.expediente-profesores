<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicationType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function publications()
    {
        return $this->hasMany(Publication::class);
    }
}
