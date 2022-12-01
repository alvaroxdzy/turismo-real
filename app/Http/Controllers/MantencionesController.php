<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenciones; 
use App\Models\Departamento; 


class MantencionesController extends Controller
{
    public function create($codigo_departamento)
    {
        $departamento = Departamento::where('codigo_departamento',$codigo_departamento)->first();
        return view('crear-mantencion')->with('departamento',$departamento);
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
    $mantencion =new Mantenciones();
    $mantencion->cod_departamento=$request->cod_departamento; 
    $mantencion->fecha=$request->fecha; 
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