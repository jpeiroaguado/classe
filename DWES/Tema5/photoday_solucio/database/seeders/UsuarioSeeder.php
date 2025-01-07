<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{

    protected $model = Usuario::class;

    public function run(): void
    {
        Usuario::factory(10)->create();

        $usuario = new Usuario();
        $usuario->nombre = 'admin';
        $usuario->email = 'admin@admin.com';
        $usuario->estado = 'Activo';
        $usuario->password = bcrypt('1234');
        $usuario->save();
    }
}
