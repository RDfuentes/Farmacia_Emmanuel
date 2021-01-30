<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// RUTA INICIAL
Route::get('/', function () {
    return view('welcome');
});

// Ruta -> recursos (vistas) -> nombre carpeta de vista -> controlador 
Route::resource('inicio','InicioController');
Route::resource('categorias','CategoriasController');
Route::resource('clientes','ClientesController');
Route::resource('proveedores','ProveedoresController');
Route::resource('ventas','VentasController');
Route::resource('productos','ProductosController');

Auth::routes(); 

Route::get('/home', 'HomeController@index')->name('home');

