<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\conexion_DB;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/connect-to-database', [conexion_DB::class, 'connectToDatabase']);


Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::get('categorias/create', [CategoriaController::class, 'create'])->name('categorias.create');
Route::post('categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::get('categorias/{id}', [CategoriaController::class, 'show'])->name('categorias.show');
Route::get('categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categorias.edit');
Route::put('categoria/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
