<?php

namespace App\Models;

use App\Traits\Versionable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable as AuditingAuditable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * @mixin IdeHelperPersonalInformation
 */
class PersonalInformation extends Model implements HasMedia, Auditable
{
    use HasFactory, InteractsWithMedia, AuditingAuditable, Versionable;

    protected $casts = [
        'skills' => 'array',
        'hobbies' => 'array',
        'references' => 'array',
    ];

    protected $auditExclude = [
        'full_name',
        'alt_full_name',
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
