<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperPersonalInformation
 */
class PersonalInformation extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $casts = [
        'skills' => 'array',
        'hobbies' => 'array',
        'references' => 'array',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile_photo')
            ->singleFile()
            ->useDisk('profile_photos');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function educational_background()
    {
        return $this->hasMany(EducationalBackground::class)->orderBy('level');
    }

    public function work_experiences()
    {
        return $this->hasMany(WorkExperience::class);
    }
}
