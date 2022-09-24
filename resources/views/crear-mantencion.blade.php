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
		<div class="row" style="background: antiquewhite;"> 
			<div class="mb-3 col-md-2">
				<label for="codigo_mantencion">Codigo</label>
				<input style="width:200px" style="text-transform:uppercase" type="text" class="form-control" id="codigo_mantencion" name="codigo_mantencion" minlength="1" maxlength="20" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">ingrese codigo para la mantencion</small>
			</div>
			<div class="mb-3 col-md-2">
				<label for="cod_departamento">Codigo departamento</label>
				<input style="width:100px"style="text-transform:uppercase" type="text" class="form-control" id="cod_departamento" name="cod_departamento"  minlength="1" maxlength="10" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">numero departamento</small>
			</div>
			<div class="mb-3 col-md-2">
				<label for="fecha">Fecha</label>
				<input style="text-transform:uppercase;width:500px;" type="date" class="form-control" id="fecha" name="fecha" required>
				<small class="form-text text-muted">fecha mantencion</small>
			</div>
		</div>
		<br> 
		<div class="row" style="background: antiquewhite;"> 
			<div class="mb-3 col-md-2">
				<label for="encargado">Encargado</label>
				<input style="width:500px"style="text-transform:uppercase" type="text" class="form-control" id="encargado" name="encargado"  minlength="1"  required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">encargado de la mantención</small>
			</div>

			<div >
				<label for="observaciones">Observaciones</label>
				<textarea style="text-transform:uppercase;width:500px" type="text-center" class="form-control" id="observaciones"  name="observaciones"  required onkeyup="javascript:this.value=this.value.toUpperCase();" for="observacion_producto"></textarea>
				<small class="form-text text-muted">observaciones</small>
			</div>
		</div>
		<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
		<br>
			<input type="submit" class="btn btn-primary"  value=" Registrar "> </input>
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
@endsection


