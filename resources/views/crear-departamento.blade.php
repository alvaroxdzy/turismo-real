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
				
			</div>
			<div class="mb-3 col-md-2">
				<label for="numero">Numero departamento</label>
				<input style="width:100px"style="text-transform:uppercase" type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				
			</div>
			<div class="mb-3 col-md-2">
				<label for="direccion">Direccion</label>
				<input style="text-transform:uppercase;width:500px;" type="text" class="form-control" id="direccion" name="direccion" required maxlength="75" onkeyup="javascript:this.value=this.value.toUpperCase();">
				
			</div>
		</div>
		<br> 
		<div class="row" style="background: antiquewhite;"> 


			<div class="mb-3 col-md-4">
				<label for="region">Región</label>
				<select class="form-control" id="regiones" name="region"></select>
				
			</div>

			<div class="mb-3 col-md-4">
				<label for="comuna">Comuna</label>
				<select class="form-control" id="comunas" name="comuna"></select>
				
			</div>
		</div>
		<br>
		<div class="row" style="background : antiquewhite;">
			<div class="mb-3 col-md-2">
				<label for="cantidad_habitaciones">Cantidad de habitaciones</label>
				<input style="text-transform:uppercase" type="text" class="form-control" id="cantidad_habitaciones" name="cantidad_habitaciones" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				
			</div>
			<div class="mb-3 col-md-2">
				<label for="cantidad_banos">Cantidad de baños </label>
				<input style="text-transform:uppercase" type="text" class="form-control" id="cantidad_banos" name="cantidad_banos" required onkeyup="javascript:this.value=this.value.toUpperCase();">
				
			</div>

			<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
		</div>
		<br>

    </form>

    <div class="card" style="background: antiquewhite;"> 
        <div class="card-body">
         <table class="table table-sm" id="tableMovimiento" style="width:100%">
          <thead>
            <button class="btn btn-outline-primary btn-sm" type="button" id="agregar_btn" > AGREGAR DETALLE </button>
            <br>
            <tr>
                <br>
                <th>Nombre objeto:</th>
                <th>Detalles:</th>
                <th>Valoracion:</th>             
                <th>Gestionar</th>
            </tr>
        </thead>
        <tbody>

            <input type="hidden" name="contador" value="0" id="contador">

        </tbody>
    </table>
    <input type="" class="btn btn-primary"  value="Guardar departamento" onclick="validarDepartamento()">  </input>
</div>
</div>
</div>
<script type="text/javascript">

    $(document).ready(function(){
        var contador = 0;

        $('#agregar_btn').on('click',function(){
            if (contador==0){

            } else {
                $('#borrar_btn'+contador).attr('hidden',true);
            }

            contador = contador+1;
            $('#contador').val(contador);
            var html = '';
            html+='<tr>'; 
            html+='<td><input id="nombre_objetos'+contador+'" class="form-control" type="text" name="nombre" required placeholder=""></td>';
            html+='<td><input id="detalles'+contador+'" class="form-control" type="text" name="detalles" required placeholder=""></td>';
            html+='<td><input id="valoracion'+contador+'" class="form-control" type="text" name="valoracion" required placeholder=""></td>';
            html+='<td><button class="btn btn-primary"  id="borrar_btn'+contador+'" type="button"> Eliminar </button> </td>';
            html+='<tr>';


            $('tbody').append(html);

            $(document).on('click','#borrar_btn'+contador,function(){

                $(this).closest('tr').remove();
                contador = contador-1;
                $('#contador').val(contador);
                $('#borrar_btn'+contador).attr('hidden',false);

            });
        })

    });
</script>

<script>
    function grabar ()
    {
     m = 0;
     n = $('#contador').val();
     arrayMovimiento = [];


     if (n == 0 ){
        arrayMovimiento;
    } else {

        while (m < n) {
          m ++;


          var datos = {
            'nombre_objetos':$("#nombre_objetos"+m).val(),
            'detalles':$("#detalles"+m).val(),
            'valoracion':$('#valoracion'+m).val()          
        };

        arrayMovimiento.push(datos);

    }
    console.log(arrayMovimiento);

    codigo_departamento = $('#codigo_departamento').val();
    direccion = $('#direccion').val();
    comuna = $('#comunas').val();
    region = $('#regiones').val();
    numero = $('#numero').val();
    cantidad_habitaciones = $('#cantidad_habitaciones').val();
    cantidad_banos = $('#cantidad_banos').val();
    estado = $('#estado').val();
    usuario = $('#usuario').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
         type:"GET", // la variable type guarda el tipo de la peticion GET,POST,..
         url:"/almacenar-departamento", //url guarda la ruta hacia donde se hace la peticion
         data:{
             "codigo_departamento":codigo_departamento,
             "direccion":direccion,
             "comuna":comuna,
             "region":region,
             "numero":numero,
             "cantidad_habitaciones":cantidad_habitaciones,
             "cantidad_banos":cantidad_banos,
             "estado":estado,
             "usuario":usuario,
             "arrayMovimiento":arrayMovimiento
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion
            console.log(data);

            if (data=='LISTASO') {
                alert('Departamento registrado');
                limpiarFormDepartamento();
                location.reload();
            } else {
                alert('Ya existe el departamento');
            }
        },
    });
}
}
</script>





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




