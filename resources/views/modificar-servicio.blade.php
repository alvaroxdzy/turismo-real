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
			<form class="form-inline" type="get" action="{{ url('/actualizar-servicio') }}">
				{{ csrf_field() }}    

				<input value="{{$servicio->id}}" type="hidden" name="id">
				<div class="row" style="background: antiquewhite;"> 

					<div class="mb-3 col-md-4">
						<label for="nombre_servicio">Nombre servicio</label>
						<input value="{{$servicio->nombre_servicio}}" style="text-transform:uppercase" type="text" class="form-control" id="nombre_servicio" name="nombre_servicio"  minlength="1" maxlength="10" required onkeyup="javascript:this.value=this.value.toUpperCase();">
						
					</div>
					<div class="mb-3 col-md-4">
						<label for="precio">Precio</label>
						<input value="{{$servicio->precio}}" style="text-transform:uppercase" type="text" class="form-control" id="precio" name="precio"  minlength="1" maxlength="10" onkeypress="return valideKey(event);">
						
					</div>

					<div class="mb-3 col-md-2">
						<label for="disponibilidad">Disponibilidad</label>
						<select class="form-control" id="estado" name="estado">
							<option value="DISPONIBLE">DISPONIBLE</option>
							<option value="NO DISPONIBLE">NO DISPONIBLE</option>
						</select>
					
					</div>
				</div>
				<br> 
				<div class="row" style="background: antiquewhite;"> 

					<div >
						<label for="detalles">Detalles</label>
						<textarea value="{{$servicio->detalles}}" style="text-transform:uppercase;width:500px" type="text-center" class="form-control" id="detalles"  name="detalles"  required onkeyup="javascript:this.value=this.value.toUpperCase();" for="observacion_producto">{{$servicio->detalles}}</textarea>
						
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


