<?php

namespace App\Models;

use App\Traits\ApiTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes, ApiTrait;

    protected $fillable = [
        'collaborator_id',
        'publication_type_id',
        'name',
        'coauthors',
        'objectives',
        'goals',
        'dissemination_medium',
        'ORCID'
    ];

    protected $allowIncluded = ['collaborator', 'publication_type', 'students'];

    protected $allowFilter = [
        'name',
        'coauthors',
        'objectives',
        'goals',
        'dissemination_medium',
        'ORCID',
        'collaborator_id',
        'publication_type_id'
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
