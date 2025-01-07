<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /*$usuario=new Usuario();
        $usuario->login='admin';
        $usuario->password=bcrypt('admin');
        $usuario->save();

        $post=new Post();
        $post->titulo='Titulo de Seeder';
        $post->contenido='Contenido post desde Seeder';
        $post->usuario()->associate($usuario);
        $post->save();*/
        Usuario::factory(5)->create();
    }
}
