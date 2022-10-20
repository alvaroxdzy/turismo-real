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
		<div class="row" style="background: antiquewhite;"> 
			<div class="mb-3 col-md-2">
				<label for="rut">Cliente rut:</label>
				<input class="form-control" name="rut" type="text" id="rut" required value="{{$userId = Auth::user()->rut;}}-{{$userId = Auth::user()->dig_rut;}}"> 
			</div>

		</div>
		<br>
		<div class="row" style="background: antiquewhite;"> 
			<div class="mb-3 col-md-2">
				<label> Fecha desde </label >
				<input class="form-control" name="fecha_desde" type="date" id="fecha_desde" required> 

			</div> 
			<div class="mb-3 col-md-2">
				<label> Fecha hasta  </label >
				<input class="form-control" name="fecha_hasta" type="date" id="fecha_hasta" required> 

			</div>
		</div>
		<br> 

		<div class="row" style="background: antiquewhite;"> 


			<div class="mb-3 col-md-4">
				<label for="region">Región</label>
				<select class="form-control" id="regiones" name="region"></select>
				
			</div>

			<div class="mb-3 col-md-4">
				<label for="comuna">Comuna</label>
				<select class="form-control" id="comunas" name="comuna"></select>
				
			</div>
		</div>
		<br>
		<h5 style="text-align: center ;"> Departamentos Disponibles </h5>
		<table id="myTable" class="table dataTable no-footer dtr-inline collapsed">

			<thead>
				<tr>
					<th>Dirección</th>
					<th>Número</th>
					<th>Habitaciones</th>
					<th>Baños</th>
				</tr>
			</thead>
			<tbody id="trTable">

			</tbody>
		</table> 

		<br> 
		<div class="row" style="background: antiquewhite;"> 
			
			<div class="mb-3 col-md-4">
				<label for="codigo_departamento">Seleccione el número del departamento a elección</label>
				<select style="width:75px" class="form-control" name="cod_departamento" id="cod_departamento" required >

				</select>
				<br>
			</div>

		</div>
		<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
		<input class="form-control" name="fecha_creacion" type="date" id="fecha_creacion"> 
		<br>

	</form>
		<input type="" class="btn btn-primary"  value=" Registrar reserva " onclick="validarReserva()"> </input>
	</div>
	<br>

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
	$(document).on('change','#comunas',function(){

		$('#myTable').DataTable().clear().destroy();
		$('#cod_departamento').empty();

		var comuna_seleccionada=$('#comunas option:selected').val();
		console.log(comuna_seleccionada);

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/filtrar-comunas", //url guarda la ruta hacia donde se hace la peticion
         data:{
         	"comunas":comuna_seleccionada,
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion

         	if (data.length==0) {
         		console.log('ERROR DE CONSULTA');
         	} else {
         		data.forEach(function(detalle) {

         			$('#trTable').append('<tr>'+
//          			'<td>'+detalle.codigo_departamento+'</td>'+
'<td>'+detalle.direccion+'</td>'+
'<td>'+detalle.numero+'</td>'+
'<td>'+detalle.cantidad_habitaciones+'</td>'+
'<td>'+detalle.cantidad_banos+'</td>'+
'</tr>');

         			$('#cod_departamento').append('<option value="'+detalle.cod_departamento+'">'+detalle.numero+'</option>');
         		});

         	}
         },
     });

	});
</script>



<script type="text/javascript">
	function grabarReserva()
	{
  rut = $('#rut').val();
  fecha_desde = $('#fecha_desde').val();
  fecha_hasta = $('#fecha_hasta').val();
  fecha_creacion = $('#fecha_creacion').val();
  cod_departamento = $('#cod_departamento :selected').text();


  console.log(rut,fecha_desde,fecha_hasta,fecha_creacion,cod_departamento);

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
             "fecha_desde":fecha_desde,
             "fecha_hasta":fecha_hasta,
             "fecha_creacion":fecha_creacion,
             "cod_departamento":cod_departamento
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


