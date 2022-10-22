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
	<h5>MODIFICAR DETALLES INVENTARIO </h5>
	<h5>inventario del departamento N° {{$inventario->cod_departamento}}  </h5>
	<div class="row mb-3">
		<div class="col-xl-12"> 
			<br>
			<form class="form-inline" type="get" action="{{ url('/actualizar-inventario') }}">
				{{ csrf_field() }}    

				<input value="{{$inventario->id}}" type="hidden" name="id">
				<div class="mb-3 col-md-4">
					<label for="nombre_servicio">Nombre del objeto</label>
					<input value="{{$inventario->nombre}}" style="text-transform:uppercase" type="text" class="form-control" id="nombre" name="nombre"  required onkeyup="javascript:this.value=this.value.toUpperCase();">

				</div>
				<div class="mb-3 col-md-4">
					<label for="nombre_servicio">Detalles sobre el objeto</label>
					<input value="{{$inventario->detalles}}" style="text-transform:uppercase" type="text" class="form-control" id="detalles" name="detalles"  required onkeyup="javascript:this.value=this.value.toUpperCase();">

				</div>
				<div class="mb-3 col-md-4">
					<label for="nombre_servicio">Valoracion del objeto</label>
					<input value="{{$inventario->valoracion}}" style="text-transform:uppercase" type="text" class="form-control" id="valoracion" name="valoracion"  required onkeyup="javascript:this.value=this.value.toUpperCase();">

				</div>
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


