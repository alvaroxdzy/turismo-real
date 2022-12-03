@extends('layouts.app')

@section('content')

<div style="padding: 0 120px;">
	<h3> Ganancias por departamento</h3>

	<div class="row">
		<div class="mb-3 col-md-2" style="width: 15.2%;">
			<label> Fecha desde </label >
			<input class="form-control" name="fecha_desde" type="date" id="fecha_desde" required value="<?php echo date("d-m-Y\TH-i");?>"> 
		</div> 

		<div class="mb-3 col-md-2" style="width: 15.2%;">
			<label> Fecha hasta </label >
			<input class="form-control" name="fecha_hasta" type="date" id="fecha_hasta" required value="<?php echo date("d-m-Y\TH-i");?>"> 

		</div> 
		<div class="mb-3 col-md-2" style="width: 15.2%;">

			<button style="margin-top: 25px;" id="btn-filtrar" type="button" class="btn btn-primary btn-sm">Filtrar</button>
		</div> 

	</div>



	<table id="myTable" class="table dataTable no-footer dtr-inline collapsed" style="width: 100%;">

		<thead>
			<tr>
				<th>Departamento</th>
				<th>Ganancias</th>
				<th>Reservas</th>

			</tr>
		</thead>
		<tbody id="trTable">
			@foreach($ganancias as $ganancia) 
			<tr class='clickable-row' data-href="">
				<td>
					<div class="box-datos">
						<div class="nombre-dpto">Nombre departamento {{$ganancia->nombre_departamento}}</div>
						<div class="texto"> Numero departamento:  {{$ganancia->numero}} </div>
						<div class="texto"> Codigo departamento:  {{$ganancia->codigo_departamento}} </div>
					</div>
				</td>
				<td>
					<div class="box-datos">
						<div class="texto"> Ganancias en dias reservados:  ${{$ganancia->costo_base}} </div>
					</div>
				</td>
				<td>
					<div class="box-datos">
						<div class="texto"> Cantidad de reservas:  {{$ganancia->reservas}} </div>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>  

</div>

<script>
	var dataTable = new DataTable("#myTable", {
		perPage: 10,
		sortable: true,
		fixedColumns: true,
		perPageSelect: [10, 25, 50, 100],
		labels: {
			placeholder: "Buscar..",
			perPage: "{select}     Registros por pagina",
			noRows: "No se encontraron registros",
			info: "Mostrando registros del {start} hasta el {end} de un total de {rows} registros",
		}

	});
</script>
<script type="text/javascript">
	function cargarFecha()
	{
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
}
</script>

<script type="text/javascript">
	window.onload=cargarFecha();
</script>

<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).on('click','#btn-filtrar',function(){

		$('#trTable').empty();

		var fecha_desde = $('#fecha_desde').val();
		var fecha_hasta = $('#fecha_hasta').val();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/filtrar-ganancias", //url guarda la ruta hacia donde se hace la peticion
         data:{
         	"fecha_desde":fecha_desde,
         	"fecha_hasta":fecha_hasta,
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion

          //$('#trTable').empty();
         	data.forEach(function(detalle) {
         		console.log(detalle);


         		$('#trTable').append('<tr>'+
         			'<td style="width:450px;">'+
         			'<div class="box-datos">'+
         			'<div class="texto">Nombre departamento: ' +detalle.nombre_departamento+'</div>'+
         			'<div class="texto">Numero departamento: ' +detalle.numero+'</div>'+
         			'<div class="texto">Codigo departamento: ' +detalle.codigo_departamento+'</div>'+	
         			'</div>'+
         			'</td>'+

         			'<td style="width:450px;">'+
         			'<div class="box-datos">'+
         			'<div class="texto">Ganancias en dias reservados: ' +detalle.costo_base+'</div>'+
         			'</div>'+
         			'</td>'+

         			'<td style="width:450px;">'+
         			'<div class="box-datos">'+
         			'<div class="texto">Cantidad de reservas: ' +detalle.reservas+'</div>'+
         			'</div>'+
         			'</td>'+

         			'</tr>');

         	});

         },
     });

	});

</script>



@endsection