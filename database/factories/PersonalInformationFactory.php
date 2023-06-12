<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Lottery;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalInformation>
 */
class PersonalInformationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $year = $this->faker->dateTimeBetween()->format('Y');
        $skills = [
            'Communication',
            'Teamwork',
            'Problem-solving',
            'Leadership',
            'Time management',
            'Adaptability',
            'Attention to detail',
            'Critical thinking',
            'Creativity',
            'Organization',
            'Technical skills',
            'Customer service',
            'Project management',
            'Analytical skills',
            'Presentation skills'
        ];
        $hobbies = [
            'Reading',
            'Writing',
            'Drawing',
            'Painting',
            'Photography',
            'Gardening',
            'Cooking',
            'Playing an instrument',
            'Singing',
            'Dancing',
            'Hiking',
            'Camping',
            'Running',
            'Cycling',
            'Swimming'
        ];
        return [
            'user_id' => User::factory(),
            'current_designation' => fake()->jobTitle(),
            'bio' => fake()->paragraph(),
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'middle_name' => fake()->lastName,
            'address' => fake()->address,
            'year_graduated' => $year,
            'id_number' => (intval($year) - 4) . '-' . fake()->randomNumber(4, true),
            'contact_number' => '+639' . fake()->randomNumber(9, true),
            'skills' => fake()->randomElements($skills, fake()->numberBetween(2, 5)),
            'hobbies' => fake()->randomElements($hobbies, fake()->numberBetween(2, 5)),
            'references' => [],
        ];
    }
}
