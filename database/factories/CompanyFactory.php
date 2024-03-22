<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->randomElement(User::where('type','user')->select('id')->pluck('id')),
            'name' => fake()->sentence(2),
            'owner' => fake()->name(),
            'gender' => fake()->randomElement(['M','F']),
        ];
    }
}
