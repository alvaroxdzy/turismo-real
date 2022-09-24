<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenciones; 

class MantencionesController extends Controller
{
    public function create()
    {
        return view('crear-mantencion');
    }

    public function store(Request $request)
    {

       $mantencion =new Mantenciones();
       $mantencion->codigo_mantencion=$request->codigo_mantencion;
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
    $mantencion = Mantenciones::where('codigo_mantencion',$id)->first();
    return view('modificar-mantencion')->with('mantencion',$mantencion);
}

public function update(Request $request)
{
   $mantencion =Mantenciones::find($request->id);
   $mantencion->codigo_mantencion=$request->codigo_mantencion;
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


    $mantenciones=Mantenciones::all();
    return view('busqueda-mantencion',compact('mantenciones'));
}
}