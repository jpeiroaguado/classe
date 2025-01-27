<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    //protected $hidden = ['precio'];

    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }
}
