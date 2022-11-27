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
		<div class="row" style="background: antiquewhite;"> 
			<div class="mb-3 col-md-5">
				<label for="nombre_servicio">Nombre servicio</label>
				<input style="text-transform:uppercase" type="text" class="form-control" id="nombre_servicio" name="nombre_servicio"  minlength="1" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				
			</div>
			<div class="mb-3 col-md-5">
				<label for="precio">Precio</label>
				<input style="text-transform:uppercase" type="text" class="form-control" id="precio" name="precio"  required onkeypress="return valideKey(event);">
				
			</div>
		</div>
		<br> 
		<div class="row" style="background: antiquewhite;"> 
			
			<div >
				<label for="detalles">Detalles</label>
				<textarea style="text-transform:uppercase;width:500px" type="text-center" class="form-control" id="detalles"  name="detalles"  required onkeyup="javascript:this.value=this.value.toUpperCase();" for="observacion_producto"></textarea>
				<br>
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


