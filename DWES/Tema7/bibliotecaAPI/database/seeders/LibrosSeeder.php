<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Libro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LibrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autor = new Autor();
        $autor->nombre = "Brandon Sanderson";
        $autor->nacimiento = 1975;
        $autor->save();
        $libro = new Libro();
        $libro->titulo = "Trenza del mar Esmeralda";
        $libro->editorial = "Editorial Nova";
        $libro->precio = 25.55;
        $libro->autor()->associate($autor);
        $libro->save();
        $libro2 = new Libro();
        $libro2->titulo = "Elantris";
        $libro2->editorial = "Editorial Nova";
        $libro2->precio = 26.50;
        $libro2->autor()->associate($autor);
        $libro2->save();
    }
}
