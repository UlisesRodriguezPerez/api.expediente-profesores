<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkUnitAndAdditionalCourse extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['collaborator_id', 'name', 'description'];

    protected $allowIncluded = ['collaborator'];

    protected $allowFilter = ['name', 'description', 'collaborator_id'];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
}
