<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MarcaController extends Controller
{

    //? Registtro de la marca 
      public function crearMarca(Request $request)
      {
        try {
            
         $marca  = new Marca();
         
         $marca -> nombre = $request -> nombre;
         if($marca -> save())
         {
            return response()->json(['status' => 'ok', 'message' => 'La marca se registro correctamente'],201);
         }

        } catch (QueryException $e) {
            return response()->json(['status' => 'error', 'message' => 'La marca ya fue registrada'],409);
        }
      }


    //? Ver todas las marcas registradas
    public function  listarMarcas()
    {
       try {
        $marcas =  Marca::all();

        return $marcas;
       } catch (\Exception $th) {
        return response()->json(['status' => 'error', 'message' => 'Ocurrio un error al intentar traer la marcas'],500);
       }    
    }


    public function actualizarMarca(Request $request, $id)
      {
        try {
            
         $marca  =  Marca::findOrFail($id);
         
         $marca -> nombre = $request -> nombre;
         if($marca -> save())
         {
            return response()->json(['status' => 'ok', 'message' => 'La marca se actualizo correctamente'],200);
         }

        } catch (QueryException $e) {
            return response()->json(['status' => 'error', 'message' => 'La marca ya esta registrada'],409);
        }
      }
}


