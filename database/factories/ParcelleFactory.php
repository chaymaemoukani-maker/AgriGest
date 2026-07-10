<?php

namespace Database\Factories;

use App\Models\Parcelle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Parcelle>
 */
class ParcelleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->word(),
            'culture' => fake()->randomElement([
                'Blé',
                'Maïs',
                'Tomate',
                'Olivier',
            ]),
            'superficie' => fake()->randomFloat(2, 1, 100),
            'date_plantation' => fake()->date(),
            'statut' => fake()->randomElement([
                'en culture',
                'récoltée',
                'en jachère',
            ]),
        ];
    }
}