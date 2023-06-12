<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperEducationalBackground
 */
class EducationalBackground extends Model
{
    use HasFactory;

    const LEVELS = [
        1 => 'Elementary',
        2 => 'Junior High School',
        3 => 'Senior High School',
        4 => 'Undergraduate',
        5 => 'Postgraduate (Masteral)',
        6 => 'Postgraduate (Doctorate)',
        7 => 'Vocational',
    ];

    protected $casts = [
        'level' => 'integer',
        'other_details' => 'array',
        'year_enrolled' => 'immutable_date',
        'year_graduated' => 'immutable_date',
    ];

    public function getLevelDescriptionAttribute()
    {
        return self::LEVELS[$this->level] ?? 'Others';
    }

    public function personal_information()
    {
        return $this->belongsTo(PersonalInformation::class);
    }
}
