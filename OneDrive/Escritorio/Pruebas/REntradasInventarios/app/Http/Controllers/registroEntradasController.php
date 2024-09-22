<?php

namespace App\Http\Controllers;

use App\Models\RegistroEntrada;
use Carbon\Carbon;
use Illuminate\Http\Request;

class registroEntradasController extends Controller
{
    //

    //? Registra las entradas al almacen 
    public function registrarEntrada(Request $request)
    {
        try {
        $entrada = new RegistroEntrada();
    
        $entrada -> tipo_entrada = $request -> tipo_entrada;
        $entrada -> fecha_entrada = Carbon::now();
        $entrada -> numero_factura = $request -> numero_factura; 
        $entrada -> usuario_id = $request -> usuario_id;
        $entrada -> bodega_id = $request -> bodega_id;
        
        if($entrada -> save())
        {
           return response()->json(['status' => 'ok','message' => 'La entrada a sido registrada con exito'],201);
        }
        
        } catch (\Exception $e) {
            return response()->json(['status' => 'error','message' => 'Algo salio mal :c , no se pudo registrar la entrada'. $e-> getMessage()],500);
        }
    }


      //? Lista todos los datos para la vista del programa
      public function  listarDetalles()
      {
           $detalles = RegistroEntrada::with('usuario:id,nombre','bodega','detalle_entradas.detalle_categorias.categoria')->get();
  
           return response()->json($detalles);
      }
}
