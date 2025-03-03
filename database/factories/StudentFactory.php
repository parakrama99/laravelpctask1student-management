<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(), // Fake name
            'email' => $this->faker->unique()->safeEmail(), // Unique fake email
            'phone' => $this->faker->numerify('##########'), // 10-digit fake phone number
            'status' => $this->faker->randomElement([1, 0]), // Random 1 or 0
            
        ];
    }
}