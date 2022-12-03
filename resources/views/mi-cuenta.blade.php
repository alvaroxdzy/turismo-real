@extends('layouts.app')

@section('content')


<div class="container" >

	<div class="card border-info mb-3" style="width:100%" >
		<div class="card-header">Mi cuenta</div>

		@csrf
		<div class="card-body">


			<div class="row" > 
				<div class="mb-2 col-md-3">
					<label for="email" >{{ __('Email') }}</label>
					<input id="email" class="form-control" type="email" name="email" value="{{ auth()->user()->email }}" readonly>
				</div>
				<div class="mb-2 col-md-2">
					<label for="rut" > Rut </label>
					<input id="rut" type="text" class="form-control" name="rut" required value="{{ auth()->user()->rut }}" readonly>
				</div>
			</div>

			<div class="row" > 
				<div class="mb-2 col-md-3">
					<label for="nombres" >{{ __('Nombres') }}</label>
					<input id="nombres" type="text" class="form-control" name="nombres" value="{{ auth()->user()->nombres }}" readonly>
				</div>
				<div class="mb-2 col-md-3">
					<label for="apellidos" >{{ __('Apellidos') }}</label>
					<input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ auth()->user()->apellidos }}" readonly>                                 
				</div>
			</div>

			<div class="row">
				<div class="mb-2 col-md-3">
					<label for="fecha_nacimiento">{{ __('Fecha nacimiento') }}</label>
					<input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ auth()->user()->fecha_nacimiento }}" readonly>
				</div>

				<div class="row">
					<div class="mb-2 col-md-5">

						<label for="direccion" >{{ __('Direccion') }}</label>

						<input id="direccion" type="text" class="form-control" name="direccion" value="{{ auth()->user()->direccion }}" readonly>
					</div>

				<div class="row">
					<div class="mb-2 col-md-4">
						<label for="telefono" >{{ __('Telefono') }}</label>
						<input id="telefono" type="text" class="form-control" name="telefono" value="{{ auth()->user()->telefono }}" readonly> 
					</div>

				</div>
			</div>

			<br>
			<h5 style="text-align: center;"> Mis reservas </h5>
			<div class="card border-primary mb-3"> 
				<div class="card-body">

					<table id="myTable" hidden class="table dataTable no-footer dtr-inline collapsed" style="width:100%">
						
						<tbody id="trTable">

						</tbody>
					</table>  
					<button class="btn btn-outline-primary btn-sm" type="button" id="revisarReservas"  > Revisar </button>
					<button class="btn btn-outline-primary btn-sm" type="button" id="ocultarReservas"  > Ocultar </button>
				</div>
			</div>


			
		</div>


		<script type="text/javascript">
			$(document).on('click','#ocultarReservas',function(){
				$('#myTable').attr("hidden", true);
			});
		</script>


		<script type="text/javascript">
			$(document).on('click','#revisarReservas',function(){
				$('#myTable').removeAttr('hidden');
				$('#trTable').empty();
				var rut=$('#rut').val();
				console.log(rut);

				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/traer-reservas", //url guarda la ruta hacia donde se hace la peticion
         data:{
         	"rut":rut,
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion

         	if (data.length==0) {
         		console.log('ERROR DE CONSULTA');

         	} else {

         		data.forEach(function(detalle) {

         			var first = detalle.fecha_hasta;
         			var second = detalle.fecha_desde;

         			var x = new Date(first);
         			var y = new Date(second);
         			var diff = x - y;
         			var dias = diff/(1000*60*60*24) ;

         			$('#trTable').append('<tr>'+
         				'<td style="width:450px;">'+
         				'<div class="box-datos">'+
         				'<div class="texto">Reserva ID: ' +detalle.id+'</div>'+
         				'<div class="texto">Nombre dpto: ' +detalle.nombre_departamento+'</div>'+
         				'<div class="texto">Numero dpto: ' +detalle.numero+'</div>'+	
         				'</div>'+
         				'</td>'+

         				'<td style="width:450px;">'+
         				'<div class="box-datos">'+
         				'<div class="texto">Fecha desde: ' +detalle.fecha_desde+'</div>'+
         				'<div class="texto">Fecha hasta: '  +detalle.fecha_hasta+'</div>'+	
         				'</div>'+
         				'</td>'+

         				'<td style="width:450px;">'+
         				'<div class="box-datos">'+
         				'<div class="texto">Direccion: ' +detalle.direccion+'</div>'+
         				'<div class="texto">Comuna: ' +detalle.comuna+'</div>'+
         				'<div class="texto">Region: ' +detalle.region+'</div>'+	
         				'</div>'+
         				'</td>'+

         				'<td style="width:450px;">'+
         				'<div class="box-datos">'+
         				'<div class="texto">Dias reservados: ' +dias+'</div>'+
         				'<div class="texto"> <button class="btn btn-primary btn-sm" "><a style="color:whitesmoke;text-decoration:none;" href="/PDF-reservas/'+detalle.id+'"> Ver detalle &#10095; </a></button></div>'+
         				'</div>'+
         				'</td>'+

         				'</tr>');

         		});

         	}
         },
     });

			});
		</script>
		@endsection



