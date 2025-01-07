<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        $estados = ['activo', 'pendiente', 'inactivo', 'rechazado'];

        // Usuaris aleatoris
        for ($c = 1; $c <= 10; $c++) {
            DB::table('usuarios')->insert([
                'usuario' => "usuario$c@example.com",
                'password' => Hash::make('password123'),
                'estado' => $estados[array_rand($estados)],
                'es_admin' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Introduim un usuari admin
        DB::table('usuarios')->insert([
            'usuario' => 'admin@admin.com',
            'password' => Hash::make('1234'),
            'estado' => 'activo',
            'es_admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
