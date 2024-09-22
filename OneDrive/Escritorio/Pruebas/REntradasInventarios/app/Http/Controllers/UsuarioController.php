<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Catch_;

class UsuarioController extends Controller
{
   public function crearUsuario(Request $request)
   {
      try {
        $usuario = new Usuario();


        /*
        * registro de usuario 
        * encriptacion de contraseña  por parte de laravel
        */
        $usuario->nombre =  $request -> nombre;
        $usuario->correo =  $request -> correo;
        $usuario->contraseña =  bcrypt($request -> contraseña)  ;

        if($usuario->save())
        {
             return response()->json(['status' => 'ok', 'message' => 'usuario creado correctamente'],201);
        }
        else{
             return response()->json(['status' => 'fail', 'message' => 'ocurrio un error y no pudo registrarse el usuario'],500);
        }

      } catch (QueryException $q) {
            return response()->json(['status' => 'error', 'message' => 'ya se ha registrado el correo electronico'],409);
      } catch(\Exception $e)
      {
        return response()->json(['status' => 'error', 'message' => 'Ocurrio un error inesperado, por favor intente de nuevo'],500);
      }
   }


  
}

