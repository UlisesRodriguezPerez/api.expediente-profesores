<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'acronym'];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
