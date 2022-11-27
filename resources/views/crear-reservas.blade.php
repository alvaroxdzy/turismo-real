@extends('layouts.app')
<style type="text/css">
	input::-webkit-outer-spin-button,
	input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}

/* Firefox */
input[type=number] {
	-moz-appearance: textfield;
}
</style>

@section('content')

<div class="container">



	<h4> Reservas Turismo Real </h4>
	<br>


	<form class="form-inline" type="get" action="{{ url('/almacenar-reservas') }}">
		{{ csrf_field() }}

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="numero">Numero</label>
			<div class="col-sm-2">
				<input style="width:100px" type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6"  onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->numero}}">
			</div>
		</div>


		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="direccion">Direccion</label>
			<div class="col-sm-2">
				<input style="text-transform:uppercase;width:500px;" type="text" class="form-control" id="direccion" name="direccion"  maxlength="75" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->direccion}}">
			</div>
		</div>

		<input type="text" id="id" name="id" hidden> 

		<input style="width:100px" style="text-transform:uppercase" type="text" class="form-control" id="codigo_departamento" name="codigo_departamento" minlength="1" maxlength="20"  onkeyup="javascript:this.value=this.value.toUpperCase();" hidden value="{{$departamento->codigo_departamento}}">		

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="comuna">Comuna</label>
			<div class="col-sm-6">
				<input  value="{{$departamento->comuna}} , {{$departamento->region}}" id="comuna" name="comuna" type="text" class="form-control">
			</div>
		</div>

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="cantidad_habitaciones">Habitaciones</label>
			<div class="col-sm-6">
				<input  value="{{$departamento->cantidad_habitaciones}}" id="cantidad_habitaciones" name="cantidad_habitaciones" type="text" class="form-control">
			</div>
		</div>

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="cantidad_banos">Baños</label>
			<div class="col-sm-6">
				<input  value="{{$departamento->cantidad_banos}}" id="cantidad_banos" name="cantidad_banos" type="text" class="form-control">
			</div>
		</div>

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="costo_base">Arriendo</label>
			<div class="col-sm-6">
				<input  value="{{$departamento->costo_base}}" id="costo_base" name="costo_base" type="text" class="form-control">
			</div>
		</div>
		<input value="{{$departamento->codigo_departamento}}" type="hidden" name="codigo_departamento" id="codigo_departamento">
		<input value="{{$userId = Auth::user()->email;}}" id="email" type="hidden" name="email">
		<input value="{{$userId = Auth::user()->rut;}}" id="rut" type="hidden" name="rut">
		<input value="{{$userId = Auth::user()->nombres;}}" id="nombres" type="hidden" name="nombres">
		<input value="{{$userId = Auth::user()->apellidos;}}" id="apellidos" type="hidden" name="apellidos">
		<input name="fecha_creacion" type="date" id="fecha_creacion"> 

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="fecha_desde">Fecha desde</label>
			<div class="col-sm-6">
				<input  id="fecha_desde" name="fecha_desde" type="date" class="form-control">
			</div>
		</div>

		<div class="mb-2 row">
			<label  class="col-sm-1 col-form-label" for="fecha_hasta">Fecha hasta</label>
			<div class="col-sm-6">
				<input  id="fecha_hasta" name="fecha_hasta" type="date" class="form-control">
			</div>
		</div>




	</form>

	<input type="" class="btn btn-primary"  value=" Registrar reserva" onclick="grabarReserva()" > </input>

</div>



<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
	window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fecha_desde').value=ano+"-"+mes+"-"+dia;
  document.getElementById('fecha_hasta').value=ano+"-"+mes+"-"+dia;

  document.getElementById('fecha_creacion').value=ano+"-"+mes+"-"+dia;
  $('#fecha_creacion').attr("hidden" , true);
}
</script>








<script type="text/javascript">
	function grabarReserva()
	{
		rut = $('#rut').val();
		email = $('#email').val();
		nombres = $('#nombres').val();
		apellidos = $('#apellidos').val();
		costo_base = $('#costo_base').val();
		fecha_desde = $('#fecha_desde').val();
		fecha_hasta = $('#fecha_hasta').val();
		fecha_creacion = $('#fecha_creacion').val();
		codigo_departamento = $('#codigo_departamento').val();


		var first = fecha_hasta;
		var second =fecha_desde;

		var x = new Date(first);
		var y = new Date(second);
		var diff = x - y;
		var dias = diff/(1000*60*60*24) ;
		costo_base = costo_base * dias;

		console.log(rut,email,nombres,apellidos,fecha_desde,fecha_hasta,fecha_creacion,codigo_departamento);

  // validaciones and focus();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/almacenar-reservas", //url guarda la ruta hacia donde se hace la peticion
         data:{

         	"rut":rut,
         	"costo_base":costo_base,
         	"fecha_desde":fecha_desde,
         	"fecha_hasta":fecha_hasta,
         	"fecha_creacion":fecha_creacion,
         	"codigo_departamento":codigo_departamento
         },

          // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion
         	console.log(data);

         	if (data=='LISTASO') {
         		alert('RESERVA REGISTRADA');
         		location.reload(); 
         	} else {
         		alert('ERROR');
         	}
         },
       });
	}


</script>

<script type="text/javascript">
	function guardarRangoFecha() {

		const fecha_desde = new Date();

		var fecha_inicio = $('#fecha_desde').val();
		fecha_desde.setDate(fecha_inicio);

		var fecha_hasta = $('#fecha_hasta').val();
		var arrayFechas = [];

		//while (fecha_desde <= fecha_hasta) {
		//	arrayFechas.push(new Date(fecha_desde));
			//fecha_desde.getDate();
		//}
		console.log(fecha_desde, fecha_hasta);
	}




</script>



<div id="error"> </div>
@if(session()->has('message'))
<div class="alert alert-success">
	{{ session()->get('message') }}
</div>
@endif
@if(session()->has('error'))
<div class="alert alert-danger">
	{{ session()->get('error') }}
</div>
@endif

</div>
@endsection


