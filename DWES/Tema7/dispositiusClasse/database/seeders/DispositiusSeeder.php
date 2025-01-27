<?php

namespace Database\Seeders;

use App\Models\dispositiu;
use App\Models\ubicacio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DispositiusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ubicacio=new ubicacio();
        /**/
        $dispositiu=new dispositiu();
        $dispositiu->nom="PC1";
        /*Per  fer la id pot fer un jumero entre 1 y 5 s cree 5 ubicacions*/
        $dispositiu->ubicacio_id()->associate($ubicacio);
        $dispositiu->save();
    }
}
