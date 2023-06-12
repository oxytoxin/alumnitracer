<?php

namespace Database\Factories;

use DateInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkExperience>
 */
class WorkExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = fake()->dateTimeBetween('-30 years', '-5 years');
        return [
            'date_from' => $date->format('Y-m-d'),
            'date_to' => $date->add(DateInterval::createFromDateString('4 years'))->format('Y-m-d'),
            'employer' => fake()->company,
            'designation' => fake()->jobTitle(),
            'other_details' => []
        ];
    }
}
