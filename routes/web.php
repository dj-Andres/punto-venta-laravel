<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', function () {
  //  return view('auth/login');
//});

Route::resource('seguridad/usuario', UsuarioController::class);

Route::resource('almacen/categoria', CategoriaController::class);

Route::resource('almacen/articulo', ArticuloController::class);

Route::resource('ventas/cliente', ClienteController::class);

Route::resource('ventas/venta', VentaController::class);

Route::resource('compras/proveedor', ProveedorController::class);

Route::resource('compras/ingreso', IngresoController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

