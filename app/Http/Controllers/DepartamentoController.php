<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 
use App\Models\Inventario_departamento; 
use App\Models\Folios; 
use DB;
use App\Helper\Files;
use Carbon\Carbon;
use Carbon\CarbonPeriod;


class DepartamentoController extends Controller
{
    public function create()
    {
        $folio = Folios::select('folio')->where('tipo','D')->first();
        return view('crear-departamento')->with('folio',$folio);

    }

    public function store(Request $request)
    {
        $departamentoValidar = Departamento::where('codigo_departamento',$request->codigo_departamento)->first();
        if ($departamentoValidar) {
           return 'YA ESTA EN USO EL CODIGO DEPARTAMENTO';
       }


       $departamento =new Departamento();
       $departamento->codigo_departamento=$request->codigo_departamento; 
       $departamento->nombre_departamento=$request->nombre_departamento;
       $departamento->direccion=$request->direccion; 
       $departamento->comuna=$request->comuna; 
       $departamento->region=$request->region; 
       $departamento->numero=$request->numero;        
       $departamento->cantidad_habitaciones=$request->cantidad_habitaciones; 
       $departamento->cantidad_banos=$request->cantidad_banos;
       $departamento->estado='DISPONIBLE';
       $departamento->usuario=$request->usuario;
       $departamento->costo_base = $request->costo_base;

       $arrayDatos = $request->arrayMovimiento;
       if($arrayDatos) {

           foreach ($arrayDatos as $datos) {

            $inventario = new Inventario_departamento();
            $inventario->cod_departamento=$request->codigo_departamento;
            $inventario->nombre=$datos['nombre_objetos'];
            $inventario->detalles=$datos['detalles'];
            $inventario->cantidad=$datos['cantidad'];
            $inventario->valoracion=$datos['valoracion'];
            $inventario->total=$datos['total'];
            $inventario->save();

        }
    } else {
        $departamento->save();

        $folio =DB::table('folios')
        ->where('tipo','D')
        ->update(['folio' => $request->codigo_departamento+1]);
        return "LISTASO";

    }
    $departamento->save();
    $folio =DB::table('folios')
    ->where('tipo','D')
    ->update(['folio' => $request->codigo_departamento+1]);

    return "LISTASO";
}

public function edit($id)
{
    $departamento = Departamento::where('codigo_departamento',$id)->first();
    return view('modificar-departamento')->with('departamento',$departamento);
}

public function update(Request $request)
{
   $departamento = DB::table('departamento')
   ->where('codigo_departamento',$request->codigo_departamento)
   ->update(['direccion' => $request->direccion,
    'comuna' => $request->comuna,
    'nombre_departamento' => $request->nombre_departamento,
    'region' => $request->region,
    'numero' => $request->numero,
    'cantidad_habitaciones' => $request->cantidad_habitaciones,
    'cantidad_banos' => $request->cantidad_banos,
    'estado' => $request->estado]) ;

   $depInventario = DB::delete('delete from inventario_departamento where cod_departamento="'.$request->codigo_departamento.'"');

   $arrayInventarios = $request->arrayMovimiento;
   if ($arrayInventarios) {
    foreach ($arrayInventarios as $inventario)
    {
        $inventarioDepa = new Inventario_departamento();

        $inventarioDepa->nombre = $inventario['nombre_objetos'];
        $inventarioDepa->detalles = $inventario['detalles'];
        $inventarioDepa->cantidad = $inventario['cantidad'];
        $inventarioDepa->valoracion = $inventario['valoracion'];
        $inventarioDepa->total = $inventario['total'];
        $inventarioDepa->cod_departamento = $request->codigo_departamento;
        $inventarioDepa->save();

    } 
}

return 'LISTASO';
}

public function destroy($id)
{
    $departamento = Departamento::find($id);
    $departamento->delete();
    return redirect(route('departamento.search'));
}

public function eliminarInventario($id)
{
  $inventario = Inventario_departamento::find($id);
  $inventario->delete();
  return 1;
}

public function search(){

    $departamentos=Departamento::all();
    return view('busqueda-departamento',compact('departamentos'));
}

public function departamentosDisponibles(){

    $departamentos=Departamento::orderBy('region','asc')
    ->where('estado','DISPONIBLE')->get();
    return view('departamentos-disponibles',compact('departamentos'));
}


public function traerDepartamento(Request $request)
{
    $cod = $request->codigo_departamento;

    $departamento = Departamento::where('codigo_departamento',$cod)->first();
    $depInventario = Inventario_departamento::where('cod_departamento',$cod)->get();
    return [$departamento, $depInventario]; 
}


public function departamentoReserva($id)
{

    $departamento = Departamento::where('codigo_departamento',$id)->first();
    $depInventario = Inventario_departamento::where('cod_departamento',$id)->get();
    return [$departamento, $depInventario]; 
}



}
