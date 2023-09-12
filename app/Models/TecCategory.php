<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TecCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class, 'category_id');
    }
}
