<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'titulo'=>$this->faker->sentence(rand(2,4)),
            'contenido'=>$this->faker->text(400),
            'usuario_id'=>Usuario::inRandomOrder()->first()->id//De la llista de usuaris agafa 1 aleatori, el primer que agafa
        ];
    }
}
