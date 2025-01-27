<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coleccion extends Model
{
    protected $table='colecciones';

    public function colecciones(){
        return $this->belongsTo(Usuario::class);
    }
    public function marcadores(){
        return $this->hasMany(Marcador::class);
    }
}
