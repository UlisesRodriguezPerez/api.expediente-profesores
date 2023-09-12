<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['publication_id', 'full_name', 'postgraduate_scholarship', 'TFG'];

    protected $allowIncluded = ['publication'];

    protected $allowFilter = ['full_name', 'postgraduate_scholarship', 'TFG', 'publication_id'];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
