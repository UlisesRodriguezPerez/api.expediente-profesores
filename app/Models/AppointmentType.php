<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppointmentType extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = ['name', 'description'];

    protected $allowIncluded = ['collaborators'];

    protected $allowFilter = ['name', 'description'];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class, 'appointment_id');
    }
}
