@extends('layouts.app')

@section('content')

<div style="padding: 0 120px;">
<h3> Ganancias por departamento</h3>

<table id="myTable" class="table dataTable no-footer dtr-inline collapsed" style="width: 100%;">

	<thead>
		<tr>
			<th>Departamento</th>
			<th>Ganancias</th>
			<th>Reservas</th>

		</tr>
	</thead>
	<tbody>
		@foreach($ganancias as $ganancia) 
		<tr class='clickable-row' data-href="">
			<td>
				<div class="box-datos">
					<div class="nombre-dpto">Nombre departamento {{$ganancia->nombre_departamento}}</div>
					<div class="texto"> Numero:  {{$ganancia->numero}} </div>
					<div class="texto"> Codigo:  {{$ganancia->codigo_departamento}} </div>
				</div>
			</td>
			<td>
				${{$ganancia->costo_base}}
				
			</td>
			<td>
				200
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

@endsection