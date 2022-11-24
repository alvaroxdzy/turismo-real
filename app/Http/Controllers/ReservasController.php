<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 
use App\Models\Inventario_departamento;
use App\Models\Reservas;  

class ReservasController extends Controller
{




    public function create()
    {
        return view('crear-reservas');
    }

    public function filterComuna(Request $request)
    {
        $comuna = $request->comunas;
        $departamentoComuna = Departamento::where('comuna',$comuna)->where('estado','DISPONIBLE')->get();

        return $departamentoComuna;

    }

    public function store(Request $request)
    {
      $reserva = new Reservas();
      $reserva->rut=$request->rut;
      $reserva->fecha_desde=$request->fecha_desde;
      $reserva->fecha_hasta=$request->fecha_hasta;
      $reserva->fecha_creacion=$request->fecha_creacion;
      $reserva->cod_departamento=$request->cod_departamento;
      $reserva->save();

      return "LISTASO" ;
  }

  public function traerReservasClientes(Request $request)
  {
    $rut = $request->rut;
      //$reservas = Reservas::where('rut',$rut)->get();

      $reservas = Reservas::join('departamento','reservas.cod_departamento', '=','departamento.codigo_departamento')->select('reservas.id','reservas.fecha_creacion','reservas.cod_departamento','reservas.fecha_desde', 'reservas.fecha_hasta' , 'departamento.direccion' , 'departamento.comuna' , 'departamento.region')->where('rut',$rut)->get();

    return $reservas;
  }

  public function show($id)
  {
        //
  }

  public function edit($id)
  {
        //
  }

  public function update(Request $request, $id)
  {
        //
  }

  public function destroy($id)
  {
        //
  }
}
