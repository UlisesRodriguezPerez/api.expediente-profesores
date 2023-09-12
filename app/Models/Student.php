<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['publication_id', 'full_name', 'postgraduate_scholarship', 'TFG'];

    public function publication()
    {
        return $this->belongsTo(Publication::class);
    }
}
