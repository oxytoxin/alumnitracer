<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWorkExperience
 */
class WorkExperience extends Model
{
    use HasFactory;

    protected $casts = [
        'date_from' => 'immutable_date',
        'date_to' => 'immutable_date',
        'other_details' => 'array',
    ];

    public function personal_information()
    {
        return $this->belongsTo(PersonalInformation::class);
    }
}
