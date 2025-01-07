<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    // Campos que se pueden rellenar
    protected $fillable = ['usuario', 'password', 'estado', 'es_admin'];

    protected $hidden = ['password'];

    // Relación con PhotoDay (un usuario puede tener muchas fotos)
    public function photoDays()
    {
        return $this->hasMany(PhotoDay::class);
    }
}
