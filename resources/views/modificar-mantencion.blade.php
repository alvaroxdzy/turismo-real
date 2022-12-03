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
	<div class="row mb-3">
		<div class="col-xl-12"> 
			<br>
			<form class="form-inline" type="get" action="{{ url('/actualizar-mantencion') }}">
				{{ csrf_field() }}    

				

				

				<div class="mb-2 row">
					<label  class="col-sm-2 col-form-label" for="nombre_departamento">Nombre condominio</label>
					<div class="col-sm-5">
						<input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->nombre_departamento}}" readonly>
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="numero">Número departamento</label>
					<div class="col-sm-5">
						<input  type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$departamento->numero}}" readonly>
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="fecha">Fecha mantención</label>
					<div class="col-sm-5">
						<input  type="date" class="form-control" id="fecha" name="fecha" required value="{{$mantencion->fecha}}">
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="encargado">Encargado</label>
					<div class="col-sm-5">
						<input value="{{$mantencion->encargado}}"  type="text" class="form-control" id="encargado" name="encargado" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="observaciones">Detalles mantención</label>
					<div class="col-sm-5">
						<textarea value="{{$mantencion->observaciones}}" style="text-transform:uppercase;width:500px" type="text-center" class="form-control" id="observaciones"  name="observaciones"  required onkeyup="javascript:this.value=this.value.toUpperCase();" for="observacion_producto">{{$mantencion->observaciones}}</textarea>
					</div>
				</div>

				<input type="text" name="cod_departamento" id="cod_departamento" value="{{$departamento->codigo_departamento}}" hidden>
				<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
				<input value="{{$mantencion->id}}" type="hidden" name="id">
				<input type="submit" class="btn btn-primary"  value="Actualizar"></input>

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
	</div>
</div>
@endsection


