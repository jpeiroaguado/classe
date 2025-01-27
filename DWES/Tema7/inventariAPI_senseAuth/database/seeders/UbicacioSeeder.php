<?php

namespace Database\Seeders;

use App\Models\Ubicacio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UbicacioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ubicacio = new Ubicacio();
        $ubicacio->nom = 'Aula 023';
        $ubicacio->save();
    }
}
