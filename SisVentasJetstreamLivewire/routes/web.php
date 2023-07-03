<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprobanteElectronicoController;
use App\Http\Controllers\DetalleImportacionController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImportacionController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomeController::class)->name('home');

Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('comprobante_electronico', ComprobanteElectronicoController::class);
Route::resource('detalle_importacion', DetalleImportacionController::class);
Route::resource('detalle_venta', DetalleVentaController::class);
Route::resource('importacion', ImportacionController::class);
Route::resource('movimiento', MovimientoController::class);
Route::resource('productos', ProductoController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('roles', RolController::class);
Route::resource('ventas', VentaController::class);

