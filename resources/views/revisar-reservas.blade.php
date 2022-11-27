@extends('layouts.app')

@section('content')

<div class="container">



	<h4> La identificación de su reserva es la numero: {{$reserva->id}}   </h4>
	<h5> Fecha de ingreso : {{$reserva->fecha_desde}}</h5>
	<h5> Fecha de salida : {{$reserva->fecha_hasta}}</h5>




	
	{{ csrf_field() }}
		<h5 style="text-align: center;"> Servicios adicionales</h5>

		@foreach($servicio as $servicios) 

		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="{{$servicios->nombre_servicio}}" id="{{$servicios->id}}">
			<label class="form-check-label" for="flexCheckDefault">
				{{$servicios->nombre_servicio}}
			</label>
		</div>

		@endforeach

</div>

@endsection
