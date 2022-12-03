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
		<h4> Gestión de servicios extras </h4>
	<div class="row mb-3">
		<div class="col-xl-12"> 
			<br>
			<form class="form-inline" type="get" action="{{ url('/actualizar-servicio') }}">
				{{ csrf_field() }}    

				<input value="{{$servicio->id}}" type="hidden" name="id">
				

				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="nombre_servicio">Nombre servicio</label>
					<div class="col-sm-5">
						<input  type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{$servicio->nombre_servicio}}">
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="detalles">Detalles servicio</label>
					<div class="col-sm-5">
						<input  type="text" class="form-control" id="detalles" name="detalles" onkeyup="javascript:this.value=this.value.toUpperCase();" required value="{{$servicio->detalles}}">
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="precio">Precio servicio</label>
					<div class="col-sm-5">
						<input  type="text" class="form-control" id="precio" name="precio" onkeypress="return valideKey(event);" required value="{{$servicio->precio}}">
					</div>
				</div>
				<div class="mb-2 row">
					<label  class="col-2 col-form-label" for="precio">Precio servicio</label>
					<div class="col-sm-5">
						<select class="form-control" id="estado" name="estado">
							<option value="DISPONIBLE">DISPONIBLE</option>
							<option value="NO DISPONIBLE">NO DISPONIBLE</option>
						</select>
					</div>
				</div>

			<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
			<br>
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


