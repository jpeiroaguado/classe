<?php

namespace Database\Seeders;

use App\Models\Dispositiu;
use App\Models\Ubicacio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispositiusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ubicacio = new Ubicacio();
        $ubicacio->nom = 'Aula 024';
        $ubicacio->save();

        $dispositiu = new Dispositiu();
        $dispositiu->nom = '686765';
        $dispositiu->descripcio = 'ORF1 | 4GB RAM | i3 | HDD';
        $dispositiu->estat = 'operatiu';
        $dispositiu->ubicacio()->associate($ubicacio);
        $dispositiu->save();

        $dispositiu = new Dispositiu();
        $dispositiu->nom = '686766';
        $dispositiu->descripcio = 'ORF1 | 4GB RAM | i3 | HDD';
        $dispositiu->estat = 'reparació';
        $dispositiu->ubicacio()->associate($ubicacio);
        $dispositiu->save();

        $ubicacio = new Ubicacio();
        $ubicacio->nom = 'Aula 025';
        $ubicacio->save();

        $dispositiu = new Dispositiu();
        $dispositiu->nom = '686760';
        $dispositiu->descripcio = 'ORM5 | 16GB RAM | i5 | SDD';
        $dispositiu->estat = 'operatiu';
        $dispositiu->ubicacio()->associate($ubicacio);
        $dispositiu->save();

        $dispositiu = new Dispositiu();
        $dispositiu->nom = '686761';
        $dispositiu->descripcio = 'ORM5 | 16GB RAM | i5 | SDD';
        $dispositiu->estat = 'operatiu';
        $dispositiu->ubicacio()->associate($ubicacio);
        $dispositiu->save();

    }
}
