<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 
use App\Models\Inventario_departamento; 
use DB;


class DepartamentoController extends Controller
{
    public function create()
    {
        return view('crear-departamento');
    }

    public function store(Request $request)
    {
        $departamentoValidar = Departamento::where('codigo_departamento',$request->codigo_departamento)->first();
        if ($departamentoValidar) {
         return 'YA ESTA EN USO EL CODIGO DEPARTAMENTO';
     }
     $departamento =new Departamento();
     $departamento->codigo_departamento=$request->codigo_departamento; 
     $departamento->direccion=$request->direccion; 
     $departamento->comuna=$request->comuna; 
     $departamento->region=$request->region; 
     $departamento->numero=$request->numero;        
     $departamento->cantidad_habitaciones=$request->cantidad_habitaciones; 
     $departamento->cantidad_banos=$request->cantidad_banos;
     $departamento->estado='DISPONIBLE';
     $departamento->usuario=$request->usuario;


     $arrayDatos = $request->arrayMovimiento;
     if($arrayDatos) {

         foreach ($arrayDatos as $datos) {

            $inventario = new Inventario_departamento();
            $inventario->cod_departamento=$request->codigo_departamento;
            $inventario->nombre=$datos['nombre_objetos'];
            $inventario->detalles=$datos['detalles'];
            $inventario->valoracion=$datos['valoracion'];
            $inventario->save();

        }
    } else {
        $departamento->save();

        return "LISTASO";
    }
    $departamento->save();

    return "LISTASO";
}

public function edit($id)
{
    $departamento = Departamento::where('codigo_departamento',$id)->first();
    return view('modificar-departamento')->with('departamento',$departamento);
}

public function update(Request $request)
{
 $departamento =Departamento::find($request->id);
 $departamento->codigo_departamento=$request->codigo_departamento; 
 $departamento->direccion=$request->direccion; 
 $departamento->comuna=$request->comuna; 
 $departamento->region=$request->region; 
 $departamento->numero=$request->numero;        
 $departamento->cantidad_habitaciones=$request->cantidad_habitaciones; 
 $departamento->cantidad_banos=$request->cantidad_banos;
 $departamento->estado=$request->estado;
 $departamento->usuario=$request->usuario;
 $departamento->save();
 return redirect(route('departamento.search'));
}

public function destroy($id)
{
    $departamento = Departamento::find($id);
    $departamento->delete();
    return redirect(route('departamento.search'));
}
public function search(){


    $departamentos=Departamento::all();
    return view('busqueda-departamento',compact('departamentos'));
}

public function traerInventario($cod_departamento) 
{
    $inventario = DB::table('inventario_departamento')
    ->where('cod_departamento', '=', $cod_departamento)
    ->get();
    
    $departamento = Departamento::where('codigo_departamento',$cod_departamento)->first();

    return view('inventario-departamento',compact('inventario'))->with('departamento',$departamento);
}

public function editInventario($id)
   {
    $inventario = Inventario_departamento::where('id',$id)->first();
    return view('modificar-inventario')->with('inventario',$inventario);
}

public function updateInventario(Request $request)
{
   $inventario =Inventario_departamento::find($request->id);
   $inventario->nombre=$request->nombre; 
   $inventario->detalles=$request->detalles; 
   $inventario->valoracion=$request->valoracion; 
   $inventario->save();

   return redirect(route('departamento.search'));
}



}
