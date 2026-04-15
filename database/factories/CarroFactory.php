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
        $catalogo = [
            'Toyota'     => ['Corolla', 'Hilux', 'Yaris', 'SW4', 'RAV4'],
            'Honda'      => ['Civic', 'HR-V', 'Fit', 'CR-V', 'City'],
            'Ford'       => ['Ka', 'Ranger', 'Bronco', 'Territory', 'Maverick'],
            'Chevrolet'  => ['Onix', 'Tracker', 'S10', 'Equinox', 'Montana'],
            'Volkswagen' => ['Gol', 'Polo', 'T-Cross', 'Amarok', 'Virtus'],
            'Fiat'       => ['Uno', 'Pulse', 'Strada', 'Toro', 'Cronos'],
            'Hyundai'    => ['HB20', 'Creta', 'Tucson', 'i30', 'Santa Fe'],
            'Jeep'       => ['Renegade', 'Compass', 'Commander', 'Wrangler'],
        ];

        $marca  = fake()->randomElement(array_keys($catalogo));
        $modelo = fake()->randomElement($catalogo[$marca]);

        return [
            'marca'  => $marca,
            'modelo' => $modelo,            
            'ano'    => fake()->numberBetween(1886, 2026),
        ];
}
}
