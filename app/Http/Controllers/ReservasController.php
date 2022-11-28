<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 
use App\Models\Inventario_departamento;
use App\Models\Reservas;  
use App\Models\Servicios;  
use App\Models\ServicioSolicitados; 
use App\Models\User; 
use Barryvdh\DomPDF\Facade\Pdf; 

class ReservasController extends Controller
{




  public function create($codigo_departamento)
  {
    $servicio = Servicios::orderBy('nombre_servicio','asc')->get();
    $departamento = Departamento::where('codigo_departamento',$codigo_departamento)->first();
    return view('crear-reservas')->with('departamento',$departamento)->with('servicio',$servicio);
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
    $reserva->costo_base=$request->costo_base;
    $reserva->fecha_desde=$request->fecha_desde;
    $reserva->fecha_hasta=$request->fecha_hasta;
    $reserva->fecha_creacion=$request->fecha_creacion;
    $reserva->cod_departamento=$request->codigo_departamento;
    $reserva->save();

    $arrayServ = $request->arrayServiciosSeleccionados;

    foreach ($arrayServ as $servicio) 
    {
      $servicio = Servicios::where('function',$servicio)->first();

      $servicios_solicitados = new ServicioSolicitados();
      $servicios_solicitados->cod_Servicio = $servicio->id;
      $servicios_solicitados->fecha =$request->fecha_creacion;
      $servicios_solicitados->costo =$servicio->precio;
      $servicios_solicitados->cod_reserva = $reserva->id;
      $servicios_solicitados->save();
    }


    return "LISTASO" ;
  }

  public function traerReservasClientes(Request $request)
  {
    $rut = $request->rut;
      //$reservas = Reservas::where('rut',$rut)->get();

    $reservas = Reservas::join('departamento','reservas.cod_departamento', '=','departamento.codigo_departamento')->select('reservas.id','reservas.fecha_creacion','reservas.cod_departamento','reservas.fecha_desde', 'reservas.fecha_hasta' , 'departamento.direccion' , 'departamento.comuna' , 'departamento.region', 'departamento.nombre_departamento' , 'departamento.numero' , 'reservas.costo_base')->where('rut',$rut)->get();

    return $reservas;
  }

  public function checkIn($id){

    $reserva = Reservas::where('id',$id)->first();

    $departamento = Departamento::where('codigo_departamento',$reserva->cod_departamento)->first();

    $usuario = User::where('rut',$reserva->rut)->first();

    $data = [
      'reserva' => $reserva,
      'departamento' => $departamento,
      'usuario' => $usuario
    ];

    $pdf = PDF::loadView('PDF-reservas',$data)->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');

    return $pdf->download('archivo-pdf.pdf');

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
