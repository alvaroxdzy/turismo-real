@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h4>Registro de mantenciones</h4>
  <div> 

 </div>
 <div class="row"> 
   <div class="clod-md-4"> </div>
   <div class="clod-md-6"> 
     <div class="row">   
       <table id="myTable" class="table dataTable no-footer dtr-inline collapsed">

        <thead>
          <tr>
            <th>ID</th>
            <th>Departamento</th>
            <th>Fecha</th>
            <th>Encargado</th>
            <th>Observaciones</th>
            <th>Usuario</th>
        
          </tr>
        </thead>
        <tbody>
          @foreach($mantenciones as $mantencion) 
          <tr class='clickable-row' data-href="modificar-mantencion/{{$mantencion->id}}">
            <td>{{$mantencion->id}} </td>
            <td>{{$mantencion->cod_departamento}}</td>
            <td>{{$mantencion->fecha}}</td>
            <td>{{$mantencion->encargado}}</td>
            <td>{{$mantencion->observaciones}}</td>
            <td>{{$mantencion->usuario}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>  
      <script>
       var dataTable = new DataTable("#myTable", {
        perPage: 10,
        sortable: true,
        fixedColumns: true,
        perPageSelect: [10, 25, 50, 100],
        labels: {
          placeholder: "Buscar..",
          perPage: "{select}     Registros por pagina",
          noRows: "No se encontraron registros",
          info: "Mostrando registros del {start} hasta el {end} de un total de {rows} registros",
        }

      });
    </script>
  </div> 
</div> 
</div> 
</div>      


<script type="text/javascript">
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>


@endsection

<style>
  #myTable tbody tr:hover {
  background-color: #f3f3f3;
  cursor:pointer;
}
</style>