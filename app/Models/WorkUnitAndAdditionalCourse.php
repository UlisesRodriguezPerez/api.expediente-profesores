<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkUnitAndAdditionalCourse extends Model
{
    use HasFactory;

    protected $fillable = ['collaborator_id', 'name', 'description'];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }
}
