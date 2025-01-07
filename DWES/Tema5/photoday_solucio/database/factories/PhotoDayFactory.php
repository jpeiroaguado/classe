<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PhotoDay>
 */
class PhotoDayFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $elemento = $this->faker->randomElement(['Playa', 'Montaña', 'Bosque', 'Arte', 'Risa', 'Tiempo', 'Amigo']);
        return [
            'titulo' => $elemento,
            'imagen' => $elemento . '.jpg',
            'descripcion' => '#'.$elemento
        ];
    }
}
