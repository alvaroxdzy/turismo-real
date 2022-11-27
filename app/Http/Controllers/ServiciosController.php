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

       $servicioNombre = str_replace(" ", "_", $request->nombre_servicio);
       $servicio =new Servicios();
       $servicio->nombre_servicio=$request->nombre_servicio; 
       $servicio->disponibilidad='DISPONIBLE'; 
       $servicio->detalles=$request->detalles; 
       $servicio->precio = $request->precio;
       $servicio->function = $servicioNombre;
       $servicio->save();

       return redirect()->back()->with('message', 'servicio registrado correctamente');
   }

   public function edit($id)
   {
    $servicio = Servicios::where('id',$id)->first();
    return view('modificar-servicio')->with('servicio',$servicio);
}

public function update(Request $request)
{
    $servicioNombre = str_replace(" ", "_", $request->nombre_servicio);
   $servicio =Servicios::find($request->id);
   $servicio->nombre_servicio=$request->nombre_servicio; 
   $servicio->disponibilidad=$request->estado; 
   $servicio->detalles=$request->detalles; 
   $servicio->precio=$request->precio;
   $servicio->function = $servicioNombre;
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