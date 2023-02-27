<?php

namespace Database\Factories;

use Pest\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Votantes>
 */
class VotantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->name(),
            'apellido' => fake()->name(),
            'correo' => fake()->unique()->safeEmail(),
            'apellido' => fake()->name(),
            'telefono' => 1234567890,
            'cedula' => 12345,
            'puesto_id' => rand(1, 11),
            'lider_id' => rand(1, 2),
            'mesa' => rand(1, 1000)
        ];
    }
}
