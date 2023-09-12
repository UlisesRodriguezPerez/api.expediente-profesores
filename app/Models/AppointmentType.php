<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppointmentType extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function collaborators()
    {
        return $this->hasMany(Collaborator::class, 'appointment_id');
    }
}
