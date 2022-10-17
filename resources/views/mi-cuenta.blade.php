@extends('layouts.app')

@section('content')


<div class="container" >

	<div class="card border-info mb-3" style="width:100%" >
		<div class="card-header">Mi cuenta</div>

		@csrf
		<div class="card-body">


			<div class="row" > 
				<div class="mb-2 col-md-3">
					<label for="email" >{{ __('Email') }}</label>
					<input id="email" class="form-control" type="email" name="email" value="{{ auth()->user()->email }}" readonly>
				</div>
				<div class="mb-2 col-md-2">
					<label for="rut" > Rut </label>
					<input id="rut" type="text" class="form-control" name="rut" required value="{{ auth()->user()->rut }}" readonly>
				</div>
				<div class="mb-2 col-md-4">
					<label for="dig_rut" > Digito verificador </label>

					<input style="width:40px" id="dig_rut" type="text" class="form-control " name="dig_rut" value="{{ auth()->user()->dig_rut }}"readonly >
				</div>
			</div>

			<div class="row" > 
				<div class="mb-2 col-md-3">
					<label for="nombres" >{{ __('Nombres') }}</label>
					<input id="nombres" type="text" class="form-control" name="nombres" value="{{ auth()->user()->nombres }}" readonly>
				</div>
				<div class="mb-2 col-md-3">
					<label for="apellidos" >{{ __('Apellidos') }}</label>
					<input id="apellidos" type="text" class="form-control" name="apellidos" value="{{ auth()->user()->apellidos }}" readonly>                                 
				</div>
			</div>

			<div class="row">
				<div class="mb-2 col-md-3">
					<label for="fecha_nacimiento">{{ __('Fecha nacimiento') }}</label>
					<input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="{{ auth()->user()->fecha_nacimiento }}" readonly>
				</div>

				<div class="row">
					<div class="mb-2 col-md-5">

						<label for="direccion" >{{ __('Direccion') }}</label>

						<input id="direccion" type="text" class="form-control" name="direccion" value="{{ auth()->user()->direccion }}" readonly>
					</div>

					<div class="mb-2 col-md-3">

						<label for="region" >{{ __('Region') }}</label>

						<input id="region" type="text" class="form-control" name="region" value="{{ auth()->user()->region }}" readonly>
					</div>                       

					<div class="mb-2 col-md-3">

						<label for="comuna">{{ __('Comuna') }}</label>
						<input id="comuna" type="text" class="form-control" name="comuna" value="{{ auth()->user()->comuna }}" readonly>
					</div>
				</div>

				<div class="row">
					<div class="mb-2 col-md-4">
						<label for="telefono" >{{ __('Telefono') }}</label>
						<input id="telefono" type="text" class="form-control" name="telefono" value="{{ auth()->user()->telefono }}" readonly> 
					</div>

				</div>
			</div>

		</div>



		@endsection