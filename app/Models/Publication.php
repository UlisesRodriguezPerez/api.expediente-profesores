<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;

    protected $fillable = [
        'collaborator_id',
        'publication_type_id',
        'publication_name',
        'coauthors',
        'objectives',
        'goals',
        'dissemination_medium',
        'ORCID'
    ];

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class);
    }

    public function publicationType()
    {
        return $this->belongsTo(PublicationType::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
