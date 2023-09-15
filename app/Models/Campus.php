<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campus extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['name', 'description', 'acronym'];

    protected $allowIncluded = ['collaborators'];

    protected $allowFilter = ['name', 'description', 'acronym'];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class);
    }
}
