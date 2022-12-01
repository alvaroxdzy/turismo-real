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

    <div class="card mb-3" >
        <h4 style="text-align:center;"> REGISTRO DE DEPARTAMENTOS</h4>
    </div>

    <div class="card  mb-3" > 
       <div class="card-body" >
         <form id="guardar" class="form-inline" type="get" action="{{ url('/almacenar-departamento') }}">
          {{ csrf_field() }}

          <div class="mb-2 row">
            <label  class="col-sm-2 col-form-label" for="nombre_departamento">Nombre condominio</label>
            <div class="col-sm-5">
               <input type="text" class="form-control" id="nombre_departamento" name="nombre_departamento" required onkeyup="javascript:this.value=this.value.toUpperCase();">
           </div>
       </div>

       <div class="mb-2 row">
           <label  class="col-2 col-form-label" for="numero">Número departamento</label>
           <div class="col-sm-5">
               <input  type="text" class="form-control" id="numero" name="numero"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
           </div>
       </div>

       <div class="mb-2 row">
        <label  class="col-sm-2 col-form-label" for="direccion">Direccion</label>
        <div class="col-sm-5">
            <input style="text-transform:uppercase;" type="text" class="form-control" id="direccion" name="direccion" required maxlength="75" onkeyup="javascript:this.value=this.value.toUpperCase();">
        </div>
    </div>


    <div class="mb-2 row"> 
        <label class="col-sm-2 col-form-label" for="region">Región</label>
        <div class="col-sm-5">
            <select style="text-align:center;" class="form-control" id="regiones" name="region"></select>
        </div>
    </div>

    <div class="mb-2 row"> 
        <label class="col-sm-2 col-form-label" for="region">Comuna</label>
        <div class="col-sm-5">
            <select style="text-align:center;" class="form-control" id="comunas" name="comuna"></select>
        </div>
    </div>

    <div class="mb-2 row">
        <label  class="col-sm-2 col-form-label" for="cantidad_habitaciones">Cantidad dormitorios</label>
        <div class="col-sm-5">
           <input  type="text" class="form-control" id="cantidad_habitaciones" name="cantidad_habitaciones"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
       </div>
   </div>

   <div class="mb-2 row">
    <label  class="col-sm-2 col-form-label" for="cantidad_banos">Cantidad baños</label>
    <div class="col-sm-5">
       <input  type="text" class="form-control" id="cantidad_banos" name="cantidad_banos"  minlength="1" maxlength="6" required onkeyup="javascript:this.value=this.value.toUpperCase();">
   </div>
</div>

<div class="mb-2 row">
    <label  class="col-sm-2 col-form-label" for="costo_base">Arriendo diario</label>
    <div class="col-sm-5">
       <input  type="text" class="form-control" id="costo_base" name="costo_base"  onkeypress="return valideKey(event);" placeholder="$">
   </div>
</div>

<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
<input value="{{$userId = Auth::user()->email;}}" id="usuario" type="hidden" name="usuario">
<input style="text-transform:uppercase" type="text" class="form-control" id="codigo_departamento" name="codigo_departamento" hidden>        
<input type="hidden" name="folios" value="{{$folio->folio}}" id="folios">

</form>

</div>
</div>

<div class="card" > 
    <div class="card-body">
     <table class="table table-sm" id="tableMovimiento" style="width:100%">
      <thead>
        <button class="btn btn-outline-primary btn-sm" type="button" id="agregar_btn" >AGREGAR INVENTARIO</button>
        <br>
        <tr>
            <th>Nombre objeto</th>
            <th>Detalles</th>
            <th>Cantidad</th>
            <th>Precio unitario</th>
            <th>Total</th>             
            <th style="margin-left: 200px;">Gestionar</th>
        </tr>
    </thead>
    <tbody>

        <input type="hidden" name="contador" value="0" id="contador">

    </tbody>
</table>
<button type="button" class="btn btn-primary"   onclick="validarDepartamento()">REGISTRAR DEPARTAMENTO</button>
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
            html+='<td style="width:350px" ><input id="nombre_objetos'+contador+'" class="form-control" type="text" name="nombre" required onkeyup="javascript:this.value=this.value.toUpperCase();"></td>';
            html+='<td ><input id="detalles'+contador+'" class="form-control" type="text" name="detalles" required onkeyup="javascript:this.value=this.value.toUpperCase();"></td>';
            html+='<td ><input id="cantidad'+contador+'" class="form-control" type="text"  onkeypress="return valideKey(event);"  onblur="calcularTotal('+contador+')"  onchange="calcularTotal('+contador+')" name="cantidad" required placeholder=""></td>';
            html+='<td ><input id="valoracion'+contador+'" class="form-control"  onblur="calcularTotal('+contador+')"  onkeypress="return valideKey(event);" onchange="calcularTotal('+contador+')" type="text" name="valoracion" required placeholder=""></td>';
            html+='<td ><input id="total'+contador+'"  class="form-control" type="text" name="total" required placeholder=""></td>';
            html+='<td><button  class="btn btn-primary"  id="borrar_btn'+contador+'" type="button"> Eliminar </button> </td>';
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

<script type="text/javascript">
    function cargarFolio() 
    {
        var folio =  $('#folios').val();

        $('#codigo_departamento').val(folio);
        $('#codigo_departamento').attr('readonly',true);
    }
</script>
<script type="text/javascript">
    window.onload = cargarFolio();
</script>

<script type="text/javascript">
    function validarDepartamento() {

      var region = $('#regiones').val();
      var comuna = $('#comunas').val();
      var codigo_departamento = $('#codigo_departamento').val();
      var numero = $('#numero').val();
      var direccion = $('#direccion').val();
      var habitaciones = $('#cantidad_habitaciones').val();
      var banos = $('#cantidad_banos').val();

      if (codigo_departamento==''){
        $('#codigo_departamento').focus();
        return false;
    }
    if (numero==''){
        $('#numero').focus();
        return false;
    }
    if (direccion==''){
        $('#direccion').focus();
        return false;
    }
    if (region=='sin-region'){
        $('#regiones').focus();
        return false;
    }
    if (comuna=='sin-comuna'){
        $('#comunas').focus();
        return false;
    }
    if (habitaciones==''){
        $('#cantidad_habitaciones').focus();
        return false;
    }
    if (banos==''){
        $('#cantidad_banos').focus();
        return false;
    }
    grabar();

}
</script>



<script type="text/javascript">
    function grabar()
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
            'cantidad':$("#cantidad"+m).val(),
            'valoracion':$('#valoracion'+m).val(),
            'total':$('#total'+m).val()     
        };

        arrayMovimiento.push(datos);

    }
    console.log(arrayMovimiento);
}

codigo_departamento = $('#codigo_departamento').val();
direccion = $('#direccion').val();
comuna = $('#comunas').val();
region = $('#regiones').val();
numero = $('#numero').val();
cantidad_habitaciones = $('#cantidad_habitaciones').val();
cantidad_banos = $('#cantidad_banos').val();
estado = $('#estado').val();
usuario = $('#usuario').val();
costo_base = $('#costo_base').val();
nombre_departamento = $('#nombre_departamento').val();

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
             "costo_base":costo_base,
             "nombre_departamento":nombre_departamento,
             "arrayMovimiento":arrayMovimiento
         }, // data recive un objeto con la informacion que se enviara al servidor
         success:function(data){ //success es una funcion que se utiliza si el servidor retorna informacion
            console.log(data);

            if (data=='LISTASO') {
               var num = document.getElementById("codigo_departamento");
               alert('Departamento registrado con el codigo :' +num.value);
               limpiarFormDepartamento();
               location.reload();
           } else {
            alert('ERROR DE CODIGO, INTENTE NUEVAMENTE');
            var num = document.getElementById("codigo_departamento");
            num.value = parseInt(num.codigo_departamento,10)+1;
        }
    },
});
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




