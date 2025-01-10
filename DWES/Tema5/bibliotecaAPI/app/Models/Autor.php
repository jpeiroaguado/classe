<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $table='autores';
    protected $hidden=['created_at', 'updated_at'];

    public function libros(){
        return $this->hasMany(Libro::class);
    }
}
