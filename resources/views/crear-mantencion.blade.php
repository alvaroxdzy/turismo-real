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
	<form class="form-inline" type="get" action="{{ url('/almacenar-mantencion') }}">
		{{ csrf_field() }}
		
		<div class="mb-2 row">
			<label  class="col-sm-2 col-form-label" for="nombre_departamento">Nombre condominio</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->nombre_departamento}}">
			</div>
		</div>
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="numero">Número departamento</label>
			<div class="col-sm-5">
				<input  type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->numero}}">
			</div>
		</div>
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="fecha">Fecha mantención</label>
			<div class="col-sm-5">
				<input  type="text" class="form-control" id="fecha" name="fecha" required value="<?php echo date("d-m-Y\TH-i");?>">
			</div>
		</div>
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="encargado">Encargado</label>
			<div class="col-sm-5">
				<input  type="text" class="form-control" id="encargado" name="encargado" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
			</div>
		</div>
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="observaciones">Detalles mantención</label>
			<div class="col-sm-5">
				<textarea style="text-transform:uppercase;" type="text-center" class="form-control" id="observaciones"  name="observaciones"  required onkeyup="javascript:this.value=this.value.toUpperCase();" for="observacion_producto"></textarea>
			</div>
		</div>

		<input  type="text" class="form-control" id="cod_departamento" name="cod_departamento" value="{{$departamento->codigo_departamento}}" hidden>
		<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">

		<button type="submit" class="btn btn-primary" >Registrar mantención</button>
	</div>
	<br>

</div>
</form>
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
document.getElementById('fecha').value=ano+"-"+mes+"-"+dia;
}
</script>


<script type="text/javascript">
	window.onload=cargarFecha();
</script>
@endsection

