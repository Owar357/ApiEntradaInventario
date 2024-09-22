<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroEntrada extends Model
{
    use HasFactory;

    protected $table = 'registro_entradas';

    public function usuario()
    {
        return $this->belongsTo(usuario::class);
    }

    public function bodega()
    {
        return $this->belongsTo(bodega::class);
    }
    
    public function detalle_entradas()
    {
        return $this->hasMany(DetalleEntrada::class);
    }

}
