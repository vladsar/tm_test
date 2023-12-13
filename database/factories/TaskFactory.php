<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title'        => ucfirst(fake()->words(3, true)),
            'description'  => fake()->paragraph(),
            'is_completed' => fake()->boolean(),
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
