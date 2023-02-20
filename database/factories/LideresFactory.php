<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lideres>
 */
class LideresFactory extends Factory
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
            'telefono' => fake()->name(),
            'cedula' => fake()->name(),
            'puesto_id' =>  rand(1, 11),
        ];
    }
}
