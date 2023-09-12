<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function internationalizations()
    {
        return $this->hasMany(Internationalization::class);
    }
}
