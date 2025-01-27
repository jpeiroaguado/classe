<?php

namespace Database\Seeders;

use App\Models\PhotoDay;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotoDaySeeder extends Seeder
{
    protected $model = PhotoDay::class;

    public function run(): void
    {
        $usuarios = Usuario::all();

        $usuarios->each(function($usuario) {
        	PhotoDay::factory()->count(10)->create([
            	'usuario_id' => $usuario->id
        	]);
    	});
    }
}
