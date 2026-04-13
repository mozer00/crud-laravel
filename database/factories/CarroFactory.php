<?php

namespace Database\Factories;

use App\Models\Carro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Carro>
 */
class CarroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'marca' => fake()->randomElement(['Toyota', 'Honda', 'Ford']),
            'modelo' => fake()->word(),
            'ano' => fake()->numberBetween(2000, 2024),
        ];
}
}
