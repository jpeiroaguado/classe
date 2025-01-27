<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ubicacio extends Model
{
    protected $table="ubicaciones";

    public function dispositius(){
        return $this->hasMany(dispositiu::class);
    }
}
