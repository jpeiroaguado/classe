<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoDay extends Model
{
    use HasFactory;

    // Relación con Usuario (una foto pertenece a un usuario)
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
