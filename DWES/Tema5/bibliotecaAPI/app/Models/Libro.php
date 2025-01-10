<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $hidden=['created_at', 'updated_at'];
    public function autor(){
        return $this->belongsTo(Autor::class);
    }
}
