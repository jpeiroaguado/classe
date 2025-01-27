<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dispositiu extends Model
{
    public function ubicacio(){
        return $this->belongsTo(ubicacio::class);
    }
}
