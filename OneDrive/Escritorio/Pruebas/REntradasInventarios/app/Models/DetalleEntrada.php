<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrada extends Model
{
    use HasFactory;

    protected $table = 'detalles_entradas';

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function registro_entrada()
    {
        return $this->belongsTo(RegistroEntrada::class);
    }

    
    public function detalle_categorias()
    {
        return $this->hasMany(DetalleCategoria::class);
    }
}
