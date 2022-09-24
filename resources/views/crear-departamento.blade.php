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
	<form id="guardar" class="form-inline" type="get" action="{{ url('/almacenar-departamento') }}">
		{{ csrf_field() }}
		<div class="row" style="background: antiquewhite;"> 
			<div class="mb-3 col-md-2">
				<label for="codigo_departamento">Codigo</label>
				<input style="width:200px" style="text-transform:uppercase" type="text" class="form-control" id="codigo_departamento" name="codigo_departamento" minlength="1" maxlength="20" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">ingrese codigo del departamento</small>
			</div>
			<div class="mb-3 col-md-2">
				<label for="numero">Numero departamento</label>
				<input style="width:100px"style="text-transform:uppercase" type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">numero departamento</small>
			</div>
			<div class="mb-3 col-md-2">
				<label for="direccion">Direccion</label>
				<input style="text-transform:uppercase;width:500px;" type="text" class="form-control" id="direccion" name="direccion" required maxlength="75" onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">direccion del departamento</small>
			</div>
		</div>
		<br> 
		<div class="row" style="background: antiquewhite;"> 


			<div class="mb-3 col-md-2">
				<label for="region">Región</label>
				<select class="form-control" id="regiones" name="region"></select>
				<small class="form-text text-muted">Region del departamento</small>
			</div>

			<div class="mb-3 col-md-2">
				<label for="comuna">Comuna</label>
				<select class="form-control" id="comunas" name="comuna"></select>
				<small class="form-text text-muted">comuna del departamento</small>
			</div>
		</div>
		<br>
		<div class="row" style="background : antiquewhite;">
			<div class="mb-3 col-md-2">
				<label for="cantidad_habitaciones">Cantidad de habitaciones</label>
				<input style="text-transform:uppercase" type="text" class="form-control" id="cantidad_habitaciones" name="cantidad_habitaciones" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted">cantidad de habitaciones</small>
			</div>
			<div class="mb-3 col-md-2">
				<label for="cantidad_banos">Cantidad de baños </label>
				<input style="text-transform:uppercase" type="text" class="form-control" id="cantidad_banos" name="cantidad_banos" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				<small class="form-text text-muted"> cantidad de baños</small>
			</div>

			<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">

		</div>
		<br>
		<input class="btn btn-primary sm" onclick="validarCampos()" value="Registrar ">  </input>
	</div>
</form>

<div class="card"> 
    <div class="card-body">

        
         <table class="table table-sm" id="tableMovimiento" style="width:100%">
          <thead>
            <button class="btn btn-outline-primary btn-sm" type="button" id="agregar_btn"  > AGREGAR DETALLE </button>
            <br>
            <tr>
                <br>
                <th>Codigo producto:</th>
                <th>Producto:</th>
                <th>Cantidad:</th>
                <th>Valor unitario(neto):</th>
                <th>IVA</th>
                <th>Total:</th>
                <th>Gestionar</th>
            </tr>
        </thead>
        <tbody>

            <input type="hidden" name="contador" value="0" id="contador">

        </tbody>
    </table>
    <input type="" class="btn btn-primary"  value="GUARDAR MOVIMIENTO " onclick="grabar()">  </input>



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


