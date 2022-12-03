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
Route::get('/inventario-departamento/{cod_departamento}',[App\Http\Controllers\DepartamentoController::class, 'traerInventario']);
Route::get('/modificar-inventario/{id}',[App\Http\Controllers\DepartamentoController::class, 'editInventario'])->name('departamento.edit');
Route::get('/actualizar-inventario',[App\Http\Controllers\DepartamentoController::class, 'updateInventario'])->name('departamento.update');
Route::get('/eliminar-inventario/{id}',[App\Http\Controllers\DepartamentoController::class, 'eliminarInventario'])->name('departamento.eliminar');

Route::get('/rango-fechas',[App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento.create');



Route::get('/reservar-departamento/{id}',[App\Http\Controllers\DepartamentoController::class, 'departamentoReserva'])->name('departamento.traer');
Route::get('/traer-departamento',[App\Http\Controllers\DepartamentoController::class, 'traerDepartamento'])->name('departamento.traer');
Route::get('/departamentos-disponibles',[App\Http\Controllers\DepartamentoController::class, 'departamentosDisponibles'])->name('departamento.departamentosDisponibles');

//RUTAS MANTENCIONES
Route::get('/crear-mantencion/{codigo_departamento}',[App\Http\Controllers\MantencionesController::class, 'create'])->name('mantencion.create');
Route::get('/buscar-mantencion',[App\Http\Controllers\MantencionesController::class, 'search'])->name('mantencion.search');
Route::get('/almacenar-mantencion',[App\Http\Controllers\MantencionesController::class, 'store'])->name('mantencion.store');
Route::get('/modificar-mantencion/{id}',[App\Http\Controllers\MantencionesController::class, 'edit'])->name('mantencion.edit');
Route::get('/actualizar-mantencion',[App\Http\Controllers\MantencionesController::class, 'update'])->name('mantencion.update');

//RUTAS SERVICIOS
Route::get('/crear-servicio',[App\Http\Controllers\ServiciosController::class, 'create'])->name('servicio.create');
Route::get('/buscar-servicio',[App\Http\Controllers\ServiciosController::class, 'search'])->name('servicio.search');
Route::get('/almacenar-servicio',[App\Http\Controllers\ServiciosController::class, 'store'])->name('servicio.store');
Route::get('/modificar-servicio/{id}',[App\Http\Controllers\ServiciosController::class, 'edit'])->name('servicio.edit');
Route::get('/actualizar-servicio',[App\Http\Controllers\ServiciosController::class, 'update'])->name('servicio.update');

//RUTAS RESERVAS

Route::get('/crear-reservas/{codigo_departamento}',[App\Http\Controllers\ReservasController::class, 'create'])->name('reservas.create');
Route::get('/filtrar-comunas',[App\Http\Controllers\ReservasController::class, 'filterComuna'])->name('reservas.filtrar');
Route::get('/almacenar-reservas',[App\Http\Controllers\ReservasController::class, 'store'])->name('reservas.store');
Route::get('/traer-reservas',[App\Http\Controllers\ReservasController::class, 'traerReservasClientes'])->name('reservas.traerReservasClientes');
Route::get('/buscar-reservas',[App\Http\Controllers\ReservasController::class, 'buscar'])->name('reservas.buscar');
Route::get('/revisar-reservas/{id}',[App\Http\Controllers\ReservasController::class, 'detalleReserva'])->name('reservas.revisar');
Route::get('/ganancias-departamento',[App\Http\Controllers\ReservasController::class, 'gananciasDepartamento'])->name('reservas.gananciasDepartamento');
Route::get('/filtrar-ganancias',[App\Http\Controllers\ReservasController::class, 'gananciasDepartamentoFiltrar'])->name('reservas.gananciasDepartamentoFiltrar');



//REPORTES
Route::get('/PDF-reservas/{id}',[App\Http\Controllers\ReservasController::class, 'checkIn'])->name('reservas.store');
Route::get('/PDF-checkOut/{id}',[App\Http\Controllers\ReservasController::class, 'checkOut'])->name('reservas.checkOut');

//RUTAS USUARIO
Route::get('/mi-cuenta',function(){
    return view('mi-cuenta');
});