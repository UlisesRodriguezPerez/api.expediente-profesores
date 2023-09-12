<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $allowIncluded = ['users']; 

    protected $allowFilter = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_users');
    }
}
