<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenciones; 
use App\Models\Departamento; 
use App\Models\Reservas;  
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class MantencionesController extends Controller
{
    public function create($codigo_departamento)
    {
        $departamento = Departamento::where('codigo_departamento',$codigo_departamento)->first();
        $fechas = Reservas::select('fecha_desde','fecha_hasta')->where('cod_departamento',$codigo_departamento)->get();
        $mantenciones = Mantenciones::select('fecha')->where('cod_departamento',$codigo_departamento)->get();

        $arrayFechas = [] ;

        foreach($fechas as $fecha)
        {
           $startDate = Carbon::createFromFormat('Y-m-d', $fecha->fecha_desde);
           $endDate = Carbon::createFromFormat('Y-m-d', $fecha->fecha_hasta);
           $dateRange = CarbonPeriod::create($startDate, $endDate);

           foreach($dateRange as $date){
             $date = $date->format('d-m-Y');
             array_push($arrayFechas, $date);
         }
     }

     foreach($mantenciones as $man){
        $fman = Carbon::createFromFormat('Y-m-d',$man->fecha);    
        $fman = $fman->format('d-m-Y');
        array_push($arrayFechas, $fman);
    }
    $arrayFechas = json_encode($arrayFechas);

    return view('crear-mantencion')->with('departamento',$departamento)->with('arrayFechas',$arrayFechas);
}

public function store(Request $request)
{
  $validarFecha = Mantenciones::where('cod_departamento',$request->cod_departamento)
  ->where('fecha',$request->fecha)
  ->where('id','!=',$request->id)
  ->first();

  $validarEstado = Departamento::where('codigo_departamento',$request->cod_departamento)
  ->where('estado','NO DISPONIBLE')
  ->first();

  if($validarFecha) {
    return redirect()->back()->with('error', 'ERROR YA HAY UNA MANTENCIÓN PARA ESTE DEPARTAMENTO EN LA FECHA SOLICITADA');
}
if($validarEstado) {
    return redirect()->back()->with('error', 'ERROR ESTE DEPARTAMENTO NO SE ENCUENTRA DISPONIBLE');
}

$dateinit = \Carbon\Carbon::parse($request->fecha);
$dateinit = $dateinit->format('Y-m-d');

$mantencion =new Mantenciones();
$mantencion->cod_departamento=$request->cod_departamento; 
$mantencion->fecha=$dateinit; 
$mantencion->encargado=$request->encargado; 
$mantencion->observaciones=$request->observaciones;        
$mantencion->usuario=$request->usuario;
$mantencion->save();

return redirect()->back()->with('message', 'mantencion registrada correctamente');
}

public function edit($id)
{
    $mantencion = Mantenciones::where('id',$id)->first();
    $departamento = Departamento::where('codigo_departamento',$mantencion->cod_departamento)->first();
    return view('modificar-mantencion')->with('mantencion',$mantencion)->with('departamento',$departamento);
}

public function update(Request $request)
{

  $validarFecha = Mantenciones::where('cod_departamento',$request->cod_departamento)
  ->where('fecha',$request->fecha)
  ->where('id','!=',$request->id)
  ->first();

  $validarEstado = Departamento::join('mantenciones','departamento.codigo_departamento','=','mantenciones.cod_departamento')
  ->where('cod_departamento',$request->cod_departamento)
  ->where('estado','NO DISPONIBLE')
  ->first();

  if($validarFecha) {
    return redirect()->back()->with('error', 'ERROR YA HAY UNA MANTENCIÓN PARA ESTE DEPARTAMENTO EN LA FECHA SOLICITADA');
}
if($validarEstado) {
    return redirect()->back()->with('error', 'ERROR ESTE DEPARTAMENTO NO SE ENCUENTRA DISPONIBLE');
}


$mantencion =Mantenciones::find($request->id);
$mantencion->cod_departamento=$request->cod_departamento; 
$mantencion->fecha=$request->fecha; 
$mantencion->encargado=$request->encargado; 
$mantencion->observaciones=$request->observaciones;        
$mantencion->usuario=$request->usuario;
$mantencion->save();
return redirect(route('mantencion.search'));
}

public function destroy($id)
{
    $mantencion = Mantenciones::find($id);
    $mantencion->delete();
    return redirect(route('mantencion.search'));
}
public function search(){


    $mantenciones=Mantenciones::orderBy('fecha','desc')->get();
    return view('busqueda-mantencion',compact('mantenciones'));
}
}