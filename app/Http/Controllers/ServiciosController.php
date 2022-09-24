<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios; 

class ServiciosController extends Controller
{
        public function create()
    {
        return view('crear-servicio');
    }

    public function store(Request $request)
    {

       $servicio =new Servicios();
       $servicio->codigo_servicio=$request->codigo_servicio;
       $servicio->nombre_servicio=$request->nombre_servicio; 
       $servicio->disponibilidad=$request->disponibilidad; 
       $servicio->detalles=$request->detalles; 
       $servicio->save();

       return redirect()->back()->with('message', 'servicio registrado correctamente');
   }

   public function edit($id)
   {
    $servicio = Servicios::where('codigo_servicio',$id)->first();
    return view('modificar-servicio')->with('servicio',$servicio);
}

public function update(Request $request)
{
   $servicio =Servicios::find($request->id);
   $servicio->codigo_servicio=$request->codigo_servicio;
   $servicio->nombre_servicio=$request->nombre_servicio; 
   $servicio->disponibilidad=$request->disponibilidad; 
   $servicio->detalles=$request->detalles; 
   $servicio->save();
   return redirect(route('servicio.search'));
}

public function destroy($id)
{
    $servicio = Servicios::find($id);
    $servicio->delete();
    return redirect(route('servicio.search'));
}
public function search(){


    $servicios=Servicios::all();
    return view('busqueda-servicio',compact('servicios'));
}
}