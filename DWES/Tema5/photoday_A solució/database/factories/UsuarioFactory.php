<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'nombre' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'email' => $this->faker->unique()->email(),
            'password' => bcrypt('DWES::2024'),
            'estado' => $this->faker->randomElement(['Pendiente', 'Activo', 'Rechazado'])
        ];
    }
}
