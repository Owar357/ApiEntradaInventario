<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCategoria extends Model
{
    use HasFactory;


    protected $table = 'detalles_categorias';

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalle_entrada()
    {
        return $this->belongsTo(DetalleEntrada::class);
    }
}
