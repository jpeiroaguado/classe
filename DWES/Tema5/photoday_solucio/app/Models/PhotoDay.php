<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoDay extends Model
{
    use HasFactory;
    protected $table = 'photo_days';

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
}
