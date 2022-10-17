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
			<form class="form-inline" id="guardar" type="get" action="{{ url('/actualizar-departamento') }}">
				{{ csrf_field() }}    

				<input value="{{$departamento->id}}" type="hidden" name="id">

				<div class="row" style="background: antiquewhite;"> 
					<div class="mb-3 col-md-1">
						<label for="codigo_departamento">Codigo</label>
						<input value="{{$departamento->codigo_departamento}}" style="width:100px" style="text-transform:uppercase" type="text" class="form-control" id="codigo_departamento" name="codigo_departamento" minlength="1" maxlength="20" required onkeyup="javascript:this.value=this.value.toUpperCase();" readonly>
						
					</div>
					<div class="mb-3 col-md-2">
						<label for="numero">Numero departamento</label>
						<input value="{{$departamento->numero}}" style="text-transform:uppercase" type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
						
					</div>

					<div class="mb-3 col-md-5">
						<label for="direccion">Direccion</label>
						<input value="{{$departamento->direccion}}" style="text-transform:uppercase;" type="text" class="form-control" id="direccion" name="direccion" required maxlength="75" onkeyup="javascript:this.value=this.value.toUpperCase();">
						
					</div>
					<div class="mb-3 col-md-2">
						<label for="estado">Estado</label>
						<select class="form-control" id="estado" name="estado">
							<option value="DISPONIBLE">DISPONIBLE</option>
							<option value="NO DISPONIBLE">NO DISPONIBLE</option>
						</select>
						
					</div>

				</div>
				<br> 

				<div class="row" style="background: antiquewhite;"> 

					<div class="mb-3 col-md-4">
						<label for="region">Región</label>
						<select class="form-control" id="regiones" name="region" required></select>
						<small class="form-text text-muted">{{$departamento->region}}</small>
					</div>

					<div class="mb-3 col-md-4">
						<label for="comuna">Comuna</label>
						<select  class="form-control" id="comunas" name="comuna" required></select>
						<small class="form-text text-muted">{{$departamento->comuna}}</small>
					</div>
				</div>
				<br>
				<div class="row" style="background : antiquewhite;">
					<div class="mb-3 col-md-2">
						<label for="cantidad_habitaciones">Cantidad de habitaciones</label>
						<input value="{{$departamento->cantidad_habitaciones}}" style="text-transform:uppercase" type="text" class="form-control" id="cantidad_habitaciones" name="cantidad_habitaciones" required onkeyup="javascript:this.value=this.value.toUpperCase();">
						
					</div>
					<div class="mb-3 col-md-2">
						<label for="cantidad_banos">Cantidad de baños </label>
						<input value="{{$departamento->cantidad_banos}}" style="text-transform:uppercase" type="text" class="form-control" id="cantidad_banos" name="cantidad_banos" required onkeyup="javascript:this.value=this.value.toUpperCase();">
						
					</div>

					<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">

				</div>
				<br>
				<input class="btn btn-primary sm" onclick="validarDepartamentoModificar()" value="Actualizar ">  </input>
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


