<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BodegaController extends Controller
{


    //? registro una nueva bodega
    public function registrarBodega(Request $request)
    { 
        try {

        
        $bodega = new Bodega();

        $bodega->nombre = $request -> nombre;
        $bodega->ubicacion = $request ->ubicacion;

        if($bodega -> save())
        {
           return  response()->json(['message' => 'ok', 'data' => $bodega , 'message' => 'La bodega se ha registrado'],201);
        }
        else 
        {
            return  response()->json(['message' => 'fail','message' => 'La bodega  no se pudo registrar'],500);
        }

    } catch (QueryException $q) {
        return response()->json(['message' => 'error', 'data' => $bodega , 'message' => 'La bodega ya se ha registrado'],409);
    }
    catch (\Exception $e) {
        return  response()->json(['message' => 'fail',  'message' => 'Ocurrio un error inesperado'],500);
    }
   }


    //? poder actualizar la bodega atraves del id
   public function  actualizarBodega(Request $request, $id )
   {
      try {
        $bodega =  Bodega::findOrFail($id);
        $bodega->nombre = $request -> nombre;
        $bodega->ubicacion = $request ->ubicacion;

         if($bodega ->save())
         {  
            return  response()->json(['message' => 'ok', 'data' => $bodega , 'message' => 'La bodega se ha actualizado'],200);
         }
         else
         {
            return  response()->json(['message' => 'fail', 'data' => $bodega , 'message' => 'La bodega no se ha podido actualizar'],404);   
         }        
      } catch (\Exception $e) {
        return  response()->json(['message' => 'error',  'message' => 'Ocurrio un error inesperado'],500);
      }
   }



   //? Lista todas la bodegas registradas
   public function verBodegas()
   {
       try {
        $bodegas = Bodega::all();

        return  response()->json(['status' => 'success','message' => 'Mostrando todas las Bodegas registradas' , 'data' => $bodegas ],200);

       } catch (\Exception $e) {
         
        return  response()->json([ 'Error'  => 'Ocurrio algo malo, y no se pudieron traer las bodegas registradas'],500);
       }
   }
}
