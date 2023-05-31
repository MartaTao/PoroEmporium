<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProfile>
 */
class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'name'=>fake()->name,
            'first_surname'=>fake()->lastName,
            'second_surname'=>fake()->lastName,
            'adress'=>fake()->lastName,
            'mobile'=>fake()->lastName,
            'birthdate' => fake()->dateTimeBetween('-50 years', '-18 years'),
        ];
    }
}
