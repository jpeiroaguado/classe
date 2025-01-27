<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ubicacio extends Model
{
    protected $table = 'ubicacions';

    public function dispositius(){
        return $this->hasMany(Dispositiu::class);
    }
}
