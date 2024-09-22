<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\DetalleEntrada;
use App\Models\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetalleEntradaController extends Controller
{


     /*
       ?  registra los detalles de los productos que se guardaran en x alamacen
       ?  guarda vla categorias a una tabla intermedia , va el producto con mas de 
       ?  una categoria 
     */
    public function registrarDetalles(Request $request)
    {

       try {
          //*Inicio de la transaccion
        DB::beginTransaction();

        /*
        * De la peticion entrante extraemos los datos a guardarse en la tabla detalles_entrada
        * Ya que es +1 detalle a registrarse; Los guardamos en arrays correspondientes
        */
        foreach ($request-> detalles  as $data) {
              $detalle = new DetalleEntrada();
              $detalle->nombre = $data['nombre'];
              $detalle->cantidad = $data['cantidad'];
              $detalle->descripcion = $data['descripcion'];
              $detalle->precio_unitario = $data['precio_unitario'];
              $detalle->impuesto = $data['impuesto'];
              $detalle->total = $data['total'];
              $detalle->entrada_id = $request['entrada_id'];
              $detalle->marca_id = $data['marca_id'];
              $detalle->save();

               /*
                *Transaccional  hacia la tabla detalle_categoria
                *Insertamos a traves de un funcion la categoria id asociada
                *Y tambien el detalle_id que se acaba de crear 
               */

               $categoriasids =  $data['categorias']; 

              foreach ($categoriasids as $categoria_id) {
                  DB::table('detalles_categorias')->insert([
                      'categoria_id' => $categoria_id,
                      'detalle_entrada_id' => $detalle -> id,
                  ]);
              }
          }
          
          //*finalizacion de la transaccion y guardado de cambios
          DB::commit();

          return response()->json(['status' => 'succes', 'message' =>  'Detalle del producto registrado correctamente'],201);


       //*si ocurre algun un error se hara un rollback
       } catch (\Exception $th) {

        DB::rollBack();
        return response()->json(['status' => 'error', 'message' =>  'Ocurrio un error al intentar registrar el detalle'. $th -> getMessage()],500);          
       }   
    }

   
 }

    


