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



	<h4> Registro de servicios extras </h4>
	<br>


	<form class="form-inline" type="get" action="{{ url('/almacenar-servicio') }}">
		{{ csrf_field() }}
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="nombre_servicio">Nombre servicio</label>
			<div class="col-sm-5">
				<input  type="text" class="form-control" id="nombre_servicio" name="nombre_servicio" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
			</div>
		</div>
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="detalles">Detalles servicio</label>
			<div class="col-sm-5">
				<input  type="text" class="form-control" id="detalles" name="detalles" onkeyup="javascript:this.value=this.value.toUpperCase();" required >
			</div>
		</div>
		<div class="mb-2 row">
			<label  class="col-2 col-form-label" for="precio">Precio servicio</label>
			<div class="col-sm-5">
				<input  type="text" class="form-control" id="precio" name="precio" onkeypress="return valideKey(event);" required >
			</div>
		</div>
		<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
		<br>
		<input type="submit" class="btn btn-primary"  value=" Registrar servicio "> </input>
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


