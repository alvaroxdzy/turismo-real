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
	<div class="card mb-3" >
		<h4 style="text-align:center;"> GESTIONAR DEPARTAMENTOS</h4>
	</div>

	<div class="card  mb-3" > 
		<div class="card-body" >
			<div class="container">
				<div class="row mb-3">
					<div class="col-xl-12"> 
						<br>
						{{ csrf_field() }}

						<div class="mb-2 row">
							<label  class="col-sm-2 col-form-label" for="nombre_departamento">Nombre condominio</label>
							<div class="col-sm-3">
								<input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
							
							<label  class="col-sm-1 col-form-label" for="numero">Numero</label>
							<div class="col-sm-2">
								<input style="width:100px" type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>

							<label  class="col-sm-1 col-form-label" for="numero">ESTADO</label>
							<div class="col-sm-2">
								<select class="form-control" id="estado" name="estado">
									<option value="DISPONIBLE">DISPONIBLE</option>
									<option value="NO DISPONIBLE">NO DISPONIBLE</option>
								</select>

							</div>
						</div>

						<div class="mb-2 row">
							<label  class="col-sm-1 col-form-label" for="direccion">Direccion</label>
							<div class="col-sm-2">
								<input style="text-transform:uppercase;width:500px;" type="text" class="form-control" id="direccion" name="direccion" required maxlength="75" onkeyup="javascript:this.value=this.value.toUpperCase();">
							</div>
						</div>

						<input type="text" id="id" name="id" hidden> 

						<input style="width:100px" style="text-transform:uppercase" type="text" class="form-control" id="codigo_departamento" name="codigo_departamento" minlength="1" maxlength="20" required onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->codigo_departamento}}" hidden>		

						<div class="row"> 


							<div class="mb-2 col-md-4">
								<label for="region">Región</label>
								<input style="text-transform:uppercase" type="text" class="form-control" id="region" name="region" required onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>

							</div>

							<div class="mb-2 col-md-4">
								<label for="comuna">Comuna</label>
								<input style="text-transform:uppercase" type="text" class="form-control" id="comuna" name="comuna" required onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>

							</div>
						</div>
						<div class="row">
							<div class="mb-2 col-md-2">
								<label for="cantidad_habitaciones">Cantidad de habitaciones</label>
								<input style="text-transform:uppercase" type="text" class="form-control" id="cantidad_habitaciones" name="cantidad_habitaciones" required onkeyup="javascript:this.value=this.value.toUpperCase();">

							</div>
							<div class="mb-3 col-md-2">
								<label for="cantidad_banos">Cantidad de baños </label>
								<input style="text-transform:uppercase" type="text" class="form-control" id="cantidad_banos" name="cantidad_banos" required onkeyup="javascript:this.value=this.value.toUpperCase();">

							</div>

							<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
						</div>


						<div class="mb-2 row">
							<label  class="col-sm-3 col-form-label" for="costo_base">Arriendo diario departamento en CLP</label>
							<div class="col-sm-2">
								<input type="text" onkeypress="return valideKey(event);" class="form-control" id="costo_base" name="costo_base" placeholder="$" >
							</div>

						</div>
					</div>
				</div>

				<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">

				<div class="card" > 
					<div class="card-body">
						<table class="table table-sm" id="tablaInventario">
							<thead>
								<button class="btn btn-outline-primary btn-sm" type="button" id="agregar_btn" > AGREGAR DETALLE </button>
								<tr>
									<th>Nombre objeto:</th>
									<th>Detalles:</th>
									<th>Cantidad:</th>
									<th>Valoracion:</th>   
									<th>Total</th>          
									<th>Gestionar</th>
								</tr>
							</thead>
							<tbody id="tbodyInventario">

								<input type="text" name="contador" value="0" id="contador" hidden>

							</tbody >
						</table>
						<input type="" class="btn btn-primary"  value="Guardar departamento" onclick="grabar()">  </input>
					</div>

				</div>

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
		</div>
	</div>



	<script type="text/javascript">

		$(document).ready(function(){
			var contador = 0;

			$('#agregar_btn').on('click',function(){
				if (contador==0){

				} else {
					$('#borrar_btn'+contador).attr('hidden',true);
				}


				contador = $('#contador').val();
				contador++;
				$('#contador').val(contador);

				var html = '';
				html+='<tr>'; 
				html+='<td><input style="width:150px" id="nombre_objetos'+contador+'"  type="text" name="nombre" required placeholder=""></td>';
				html+='<td><input style="width:150px" id="detalles'+contador+'"  type="text" name="detalles" required placeholder=""></td>';
				html+='<td><input style="width:150px" id="cantidad'+contador+'"  type="text"  onchange="calcularTotal('+contador+')" name="cantidad" required placeholder=""></td>';
				html+='<td><input style="width:150px" id="valoracion'+contador+'"  onchange="calcularTotal('+contador+')" type="text" name="valoracion" required placeholder=""></td>';
				html+='<td><input style="width:150px" id="total'+contador+'"  type="text" name="total" required placeholder=""></td>';
				html+='<td><button id="borrar_btn'+contador+'" type="button"> Eliminar </button> </td>';
				html+='<tr>';


				$('tbody').append(html);

				$(document).on('click','#borrar_btn'+contador,function(){

					$(this).closest('tr').remove();
					contador = contador-1;
					$('#contador').val(contador);
					$('#borrar_btn'+contador).attr('hidden',false);

				});
			})

		});
	</script>




	<script type="text/javascript">
		function traerDepartamento()
		{
			$('#contador').val(0);

			$('#tbodyInventario> tr').remove();
			var codigo_departamento = $('#codigo_departamento').val();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			}); 

			$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/traer-departamento", //url guarda la ruta hacia donde se hace la peticion
         data:{
         	"codigo_departamento":codigo_departamento,
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion

         	console.log(data);
         	contadorInventario = $('#contador').val();

         	data[1].forEach(function(detalle) {
         		contadorInventario++;


         		$('#tbodyInventario').append('<tr>'+
         			'<td><input style="width:150px" id="nombre_objetos'+contadorInventario+'" type="text" value="'+detalle.nombre+'" ></td>'+
         			'<td><input style="width:150px" id="detalles'+contadorInventario+'" type="text" value="'+detalle.detalles+'" ></td>'+
         			'<td><input style="width:150px" id="cantidad'+contadorInventario+'" onblur="traerTotal('+contadorInventario+')" onchange="traerTotal('+contadorInventario+')" type="text" value="'+detalle.cantidad+'" ></td>'+
         			'<td><input style="width:150px" id="valoracion'+contadorInventario+'"  onblur="traerTotal('+contadorInventario+')" onchange="traerTotal('+contadorInventario+')" type="text" value="'+detalle.valoracion+'" ></td>'+
         			'<td><input style="width:150px" id="total'+contadorInventario+'" type="text" value="'+detalle.total+'" ></td>'+
         			'<td><button type="button" onclick="eliminarInventario('+detalle.id+')"> Eliminar </button> </td>'+

         			'</tr>');


         		$('#contador').val(contadorInventario);
         	});

         	$('#id').val(data[0].codigo_departamento);
         	$('#numero').val(data[0].numero);
         	$('#direccion').val(data[0].direccion);
         	$('#comuna').val(data[0].comuna);
         	$('#region').val(data[0].region);
         	$('#cantidad_habitaciones').val(data[0].cantidad_habitaciones);
         	$('#cantidad_banos').val(data[0].cantidad_banos);
         	$('#costo_base').val(data[0].costo_base);
         	$('#nombre_departamento').val(data[0].nombre_departamento);

         },
     });



		}
	</script>

	<script type="text/javascript">
		function eliminarInventario(id)
		{
			var result = confirm("SEGURO QUE DESEA ELIMINAR?");
			if (result){
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/eliminar-inventario/" +id, //url guarda la ruta hacia donde se hace la peticion
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion
         	if(data==1){
         		location.reload();
         	}
         },
     });
			}
		} 
	</script>


	<script type="text/javascript">
		window.onload=traerDepartamento();
	</script>

	<script type="text/javascript">
		function grabar()
		{
			m = 0;
			n = $('#contador').val();
			console.log('contador'+n)
			arrayMovimiento = [];


			if (n == 0 ){
				arrayMovimiento;
			} else {

				while (m < n) {
					m ++;


					var datos = {
						'nombre_objetos':$("#nombre_objetos"+m).val(),
						'detalles':$("#detalles"+m).val(),
						'cantidad':$("#cantidad"+m).val(),
						'valoracion':$('#valoracion'+m).val(),
						'total':$('#total'+m).val()          
					};

					arrayMovimiento.push(datos);

				}
				console.log(arrayMovimiento);
			}

			codigo_departamento = $('#codigo_departamento').val();
			nombre_departamento = $('#nombre_departamento').val();
			direccion = $('#direccion').val();
			comuna = $('#comuna').val();
			region = $('#region').val();
			numero = $('#numero').val();
			cantidad_habitaciones = $('#cantidad_habitaciones').val();
			cantidad_banos = $('#cantidad_banos').val();
			estado = $('#estado').val();
			usuario = $('#usuario').val();
			costo_base = $('#costo_base').val();

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/actualizar-departamento", //url guarda la ruta hacia donde se hace la peticion
         data:{
         	"codigo_departamento":codigo_departamento,
         	"direccion":direccion,
         	"nombre_departamento":nombre_departamento,
         	"comuna":comuna,
         	"region":region,
         	"numero":numero,
         	"cantidad_habitaciones":cantidad_habitaciones,
         	"cantidad_banos":cantidad_banos,
         	"estado":estado,
         	"usuario":usuario,
         	"costo_base":costo_base,
         	"arrayMovimiento":arrayMovimiento
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion
         	console.log(data);

         	if (data=='LISTASO') {
         		alert('Departamento actualizado');
         		location.reload();
         	} else {
         		alert('ERROR, REVISE QUE TODOS LOS CAMPOS ESTEN COMPLETOS');	
         	}
         },
     });
		}

	</script>

	@endsection


