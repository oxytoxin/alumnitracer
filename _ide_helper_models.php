<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\EducationalBackground
 *
 * @property int $id
 * @property int $personal_information_id
 * @property int $year_enrolled
 * @property int $year_graduated
 * @property int $level
 * @property string $institution
 * @property array $other_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PersonalInformation|null $personal_information
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground query()
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereInstitution($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereOtherDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground wherePersonalInformationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereYearEnrolled($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EducationalBackground whereYearGraduated($value)
 * @mixin \Eloquent
 */
	class IdeHelperEducationalBackground {}
}

namespace App\Models{
/**
 * App\Models\PersonalInformation
 *
 * @property int $id
 * @property int $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string|null $suffix
 * @property string $address
 * @property int $year_graduated
 * @property string $id_number
 * @property string $contact_number
 * @property array $skills
 * @property array $hobbies
 * @property array $references
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\EducationalBackground> $educational_backgrounds
 * @property-read int|null $educational_backgrounds_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\WorkExperience> $work_experiences
 * @property-read int|null $work_experiences_count
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereHobbies($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereIdNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereReferences($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereSuffix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PersonalInformation whereYearGraduated($value)
 * @mixin \Eloquent
 */
	class IdeHelperPersonalInformation {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\WorkExperience
 *
 * @property int $id
 * @property int $personal_information_id
 * @property string $employer
 * @property \Carbon\CarbonImmutable $date_from
 * @property \Carbon\CarbonImmutable|null $date_to
 * @property array $other_details
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\PersonalInformation|null $personal_information
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereDateFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereDateTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereEmployer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereOtherDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience wherePersonalInformationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkExperience whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperWorkExperience {}
}

