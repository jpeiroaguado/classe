<?php

namespace Database\Factories;
use App\Models\Usuario;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition(): array
    {
        return [
            'login'=>$this->faker->unique()->userName(),
            'password'=>$this->faker->password()
        ];
    }
}
