<?php

namespace Database\Factories;

use App\Models\EducationalBackground;
use App\Models\PersonalInformation;
use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EducationalBackground>
 */
class EducationalBackgroundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $enrol = fake()->dateTimeBetween('-30 years', '-2 years');
        return [
            'personal_information_id' => PersonalInformation::factory(),
            'year_enrolled' => $enrol->format('Y-m-d'),
            'year_graduated' => $enrol->add(DateInterval::createFromDateString('4 years'))->format('Y-m-d'),
            'level' => fake()->numberBetween(1, 7),
            'institution' => fake()->city . ' Educational Institute',
            'other_details' => []
        ];
    }
}
