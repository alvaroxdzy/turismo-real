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
Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//RUTAS DEPARTAMENTO
Route::get('/crear-departamento',[App\Http\Controllers\DepartamentoController::class, 'create'])->name('departamento.create');
Route::get('/buscar-departamento',[App\Http\Controllers\DepartamentoController::class, 'search'])->name('departamento.search');
Route::get('/almacenar-departamento',[App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamento.store');
Route::get('/modificar-departamento/{id}',[App\Http\Controllers\DepartamentoController::class, 'edit'])->name('departamento.edit');
Route::get('/actualizar-departamento',[App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamento.update');


//RUTAS MANTENCIONES
Route::get('/crear-mantencion',[App\Http\Controllers\MantencionesController::class, 'create'])->name('mantencion.create');
Route::get('/buscar-mantencion',[App\Http\Controllers\MantencionesController::class, 'search'])->name('mantencion.search');
Route::get('/almacenar-mantencion',[App\Http\Controllers\MantencionesController::class, 'store'])->name('mantencion.store');
Route::get('/modificar-mantencion/{id}',[App\Http\Controllers\MantencionesController::class, 'edit'])->name('mantencion.edit');
Route::get('/actualizar-mantencion',[App\Http\Controllers\MantencionesController::class, 'update'])->name('mantencion.update');
