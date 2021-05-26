<?php

use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\ProveedorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('almacen/categoria', CategoriaController::class);

Route::resource('almacen/articulo', ArticuloController::class);

Route::resource('ventas/cliente', ClienteController::class);

Route::resource('compras/proveedor', ProveedorController::class);

Route::resource('compras/ingreso', IngresoController::class);
