<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{

   //? ver todas la categorias creadas
   public function listarCategoria()
   {
      $categorias = Categoria::all();

      return response()->json($categorias);
   }
  

   //? registrar una o varias categorias al mismo tiemnpo
   public function agregarCategorias(Request $request)
   {
      try {
         foreach ($request -> categorias as  $data)  {
            $categorias = new Categoria();
            $categorias  -> nombre  = $data['nombre'];
            $categorias -> save();   
         }

         return response()->json(['status' => 'ok','message' => 'Categoria/as agregadas correctamente'],201);
      } catch (\Exception $e) {
         return response()->json(['status' => 'fail','message' => 'Ocurrio un error inesperado, por favor vuelva a intentar'],500);
      }
   }

}
