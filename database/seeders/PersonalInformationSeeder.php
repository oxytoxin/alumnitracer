<?php

namespace Database\Seeders;

use App\Models\EducationalBackground;
use App\Models\PersonalInformation;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;

class PersonalInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'email' => 'markjohnlerry.casero@msugensan.edu.ph',
        ]);
        PersonalInformation::factory()
            ->has(
                EducationalBackground::factory()->count(4)
                    ->sequence(...collect(EducationalBackground::LEVELS)->map(fn ($l, $k) => ['level' => $k])->toArray()),
                'educational_background',
            )
            ->has(
                WorkExperience::factory()->count(4),
                'work_experiences',
            )
            ->create([
                'user_id' => $user->id,
                'first_name' => 'Mark John Lerry',
                'middle_name' => 'Acosta',
                'last_name' => 'Casero',
                'year_graduated' => 2022,
                'id_number' => '2018-0356',
                'contact_number' => '+639086601340',
            ]);
        $user->assignRole('alumni');
        User::factory()
            ->has(
                PersonalInformation::factory()->has(
                    EducationalBackground::factory()->count(4)
                        ->sequence(...collect(EducationalBackground::LEVELS)->map(fn ($l, $k) => ['level' => $k])->toArray()),
                    'educational_background',
                )->has(
                    WorkExperience::factory()->count(4),
                    'work_experiences',
                ),
                'personal_information'
            )
            ->count(20)
            ->create()
            ->each(function (User $user) {
                $user->assignRole('alumni');
            });
    }
}
