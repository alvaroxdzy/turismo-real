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

				<input value="{{$mantencion->id}}" type="hidden" name="id">

				<div class="row" style="background: antiquewhite;"> 

					<div class="mb-3 col-md-2">
						<label for="cod_departamento">Codigo departamento</label>
						<input value="{{$mantencion->cod_departamento}}" style="width:100px"style="text-transform:uppercase" type="text" class="form-control" id="cod_departamento" name="cod_departamento"  minlength="1" maxlength="10" required onkeyup="javascript:this.value=this.value.toUpperCase();">
						<small class="form-text text-muted">numero departamento</small>
					</div>
					<div class="mb-3 col-md-2">
						<label for="fecha">fecha</label>
						<input value="{{$mantencion->fecha}}" style="text-transform:uppercase;width:500px;" type="date" class="form-control" id="fecha" name="fecha" required>
						<small class="form-text text-muted">fecha mantencion</small>
					</div>
				</div>
				<br> 
				<div class="row" style="background: antiquewhite;"> 
					<div class="mb-3 col-md-2">
						<label for="encargado">Encargado</label>
						<input value="{{$mantencion->encargado}}" style="width:500px"style="text-transform:uppercase" type="text" class="form-control" id="encargado" name="encargado"  minlength="1"  required onkeyup="javascript:this.value=this.value.toUpperCase();">
						<small class="form-text text-muted">encargado de la mantención</small>
					</div>

					<div >
						<label for="observaciones">Observaciones</label>
						<textarea value="{{$mantencion->observaciones}}" style="text-transform:uppercase;width:500px" type="text-center" class="form-control" id="observaciones"  name="observaciones"  required onkeyup="javascript:this.value=this.value.toUpperCase();" for="observacion_producto">{{$mantencion->observaciones}}</textarea>
						<small class="form-text text-muted">observaciones</small>
					</div>
				</div>
				<br>
				<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
				
				<input type="submit" class="btn btn-primary"  value="Actualizar ">  </input>
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


