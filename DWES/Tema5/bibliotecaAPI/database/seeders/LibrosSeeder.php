<?php

namespace Database\Seeders;

use App\Http\Controllers\AutorController;
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
        $autor= new Autor();
        $autor->nombre="Brandom Sanderson";
        $autor->nacimiento=1975;
        $autor->save();

        $libro= new Libro();
        $libro->titulo="Elantris";
        $libro->editorial="Editorial Nova";
        $libro->precio=29.55;
        $libro->autor()->associate($autor);
        $libro->save();

        $libro= new Libro();
        $libro->titulo="Elantris2";
        $libro->editorial="Editorial Nova2";
        $libro->precio=29.58;
        $libro->autor()->associate($autor);
        $libro->save();
    }
}
