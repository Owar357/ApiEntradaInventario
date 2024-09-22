<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;

     public  function registros()
    {
        return $this->hasMany(RegistroEntrada::class);
    }
}
