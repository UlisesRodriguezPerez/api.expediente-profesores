<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $allowIncluded = ['collaborators'];

    protected $allowFilter = ['name', 'description'];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
