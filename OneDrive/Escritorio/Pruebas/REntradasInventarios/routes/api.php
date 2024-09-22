<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DetalleEntradaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\registroEntradasController;
use App\Http\Controllers\UsuarioController;
use App\Models\DetalleEntrada;
use App\Models\RegistroEntrada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


//? Rutas para el manejo de usuarios
Route:: post('registrar/usuario',[UsuarioController::class, 'crearUsuario']);


//? Rutas para el manejo de bodegas
Route:: post('registrar/bodega',[BodegaController::class, 'registrarBodega']);
Route:: put('actualizar/bodega',[BodegaController::class, 'actualizarBodega']);
Route:: get('listar/bodegas',[BodegaController::class, 'verBodegas']);

//? Rutas para el manejo de Las entradas
Route:: post('registrar/entrada',[registroEntradasController::class, 'registrarEntrada']);
Route:: get('listar/detalles',[registroEntradasController::class, 'listarDetalles']);

//? Rutas para el manejo de los detalles de productos entrantes
Route:: post('registrar/detalles' ,[DetalleEntradaController::class, 'registrarDetalles']);
 
//? Rutas para el manejo de las marcas
Route:: get('listar/marcas',[MarcaController::class, 'listarMarcas']);
Route:: post('registrar/marca',[MarcaController::class, 'crearMarca']);
Route:: put('actualizar/marca',[MarcaController::class, 'actualizarMarca']);

//? Rutas para el manejo de las categorias
Route:: get('ver/categorias' ,[CategoriaController::class, 'listarCategoria']);
Route:: post('registrar/categorias' ,[CategoriaController::class, 'agregarCategorias']);