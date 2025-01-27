<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dispositiu extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    public function ubicacio(){
        return $this->belongsTo(Ubicacio::class);
    }
}
