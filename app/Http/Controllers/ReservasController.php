<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departamento; 
use App\Models\Inventario_departamento;
use App\Models\Reservas;  
use App\Models\Servicios;  
use App\Models\ServicioSolicitados; 
use App\Models\User;
use App\Models\Mantenciones;
use DB;  
use Barryvdh\DomPDF\Facade\Pdf; 
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class ReservasController extends Controller
{




  public function create($codigo_departamento)
  {
    $servicio = Servicios::orderBy('nombre_servicio','asc')->get();
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
  return view('crear-reservas')->with('departamento',$departamento)->with('servicio',$servicio)->with('arrayFechas',$arrayFechas);
}

public function filterComuna(Request $request)
{
  $comuna = $request->comunas;
  $departamentoComuna = Departamento::where('comuna',$comuna)->where('estado','DISPONIBLE')->get();

  return $departamentoComuna;

}

public function store(Request $request)
{
  $dateinit = \Carbon\Carbon::parse($request->fecha_desde);
  $datefim = \Carbon\Carbon::parse($request->fecha_hasta);
  $dateinit = $dateinit->format('Y-m-d');
  $datefim = $datefim->format('Y-m-d');

  $fechas = Reservas::select('fecha_desde','fecha_hasta')->where('cod_departamento',$request->codigo_departamento)->get();

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

  $arrayFechas2 = [];
  $dateRange2 = CarbonPeriod::create($dateinit,$datefim);
  foreach($dateRange2 as $date2){
    $date2 = $date2->format('d-m-Y');
    array_push($arrayFechas2, $date2);
  }



  if($dateRange2 = array_intersect($arrayFechas2, $arrayFechas)) {
    return 'HOLA' ;
  } else {
    $reserva = new Reservas();
    $reserva->rut=$request->rut;
    $reserva->costo_base=$request->costo_base;
    $reserva->fecha_desde=$dateinit;
    $reserva->fecha_hasta=$datefim;
    $reserva->fecha_creacion=$request->fecha_creacion;
    $reserva->cod_departamento=$request->codigo_departamento;
    $reserva->save();

    $arrayServ = $request->arrayServiciosSeleccionados;

    if ($arrayServ) {
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
   }
 }
 return 'LISTASO';
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

  $servicios_solicitados = ServicioSolicitados::where('cod_reserva',$reserva->id)->get();

  $servicio = ServicioSolicitados::join('servicios','servicios-solicitados.cod_servicio','=','servicios.id')->where('servicios-solicitados.cod_reserva',$reserva->id)->get();

  $currentDate = Carbon::createFromFormat('Y-m-d', $reserva->fecha_desde);
  $shippingDate = Carbon::createFromFormat('Y-m-d', $reserva->fecha_hasta);

  $diferencia_en_dias = $currentDate->diffInDays($shippingDate);
  $costo_servicios = ServicioSolicitados::where('cod_reserva',$reserva->id)->sum('costo');

  $total = $costo_servicios+$reserva->costo_base;

  $data = [
    'reserva' => $reserva,
    'departamento' => $departamento,
    'usuario' => $usuario,
    'servicios_solicitados' =>$servicios_solicitados,
    'servicio' => $servicio,
    'diferencia_en_dias' => $diferencia_en_dias,
    'costo_servicios' => $costo_servicios,
    'total' => $total
  ];

  $pdf = PDF::loadView('PDF-reservas',$data)->setOptions(['defaultFont' => 'sans-serif'])->setPaper('a4', 'landscape');

  return $pdf->download('archivo-pdf.pdf');

}



public function buscar()
{
 $reservas = Reservas::all();

 return view('busqueda-reservas',compact('reservas'));
}

public function detalleReserva($id)
{
  $reserva = Reservas::where('id',$id)->first();

  $departamento = Departamento::where('codigo_departamento',$reserva->cod_departamento)->first();

  $usuario = User::where('rut',$reserva->rut)->first();

  $servicios_solicitados = ServicioSolicitados::where('cod_reserva',$reserva->id)->get();

  $servicio = ServicioSolicitados::join('servicios','servicios-solicitados.cod_servicio','=','servicios.id')->where('servicios-solicitados.cod_reserva',$reserva->id)->get();

  $currentDate = Carbon::createFromFormat('Y-m-d', $reserva->fecha_desde);
  $shippingDate = Carbon::createFromFormat('Y-m-d', $reserva->fecha_hasta);

  $diferencia_en_dias = $currentDate->diffInDays($shippingDate);
  $costo_servicios = ServicioSolicitados::where('cod_reserva',$reserva->id)->sum('costo');

  $total = $costo_servicios+$reserva->costo_base;

  return view('detalle-reserva')->with('reserva',$reserva)->with('departamento',$departamento)->with('usuario',$usuario)->with('Servicios_solicitados',$servicios_solicitados)->with('servicio',$servicio)->with('diferencia_en_dias',$diferencia_en_dias)->with('costo_servicios',$costo_servicios)->with('total',$total);
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
