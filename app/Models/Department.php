<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public function affiliates()
    {
        return $this->morphMany(Affiliation::class, 'entity');
    }

    public function college()
    {
        return $this->belongsTo(College::class);
    }
}
