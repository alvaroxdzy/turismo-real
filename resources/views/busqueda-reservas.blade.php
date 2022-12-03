@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h4>Gestor de reservas</h4>
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
            <th>Cliente</th>
            <th>Fecha desde</th>
            <th>Fecha hasta</th>
          </tr>
        </thead>
        <tbody>
          @foreach($reservas as $reserva) 
          <tr class='clickable-row' data-href="/revisar-reservas/{{$reserva->id}}">
            <td>{{$reserva->id}} </td>
            <td>{{$reserva->cod_departamento}}</td>
            <td>{{$reserva->rut}}</td>
            <td>{{$reserva->fecha_desde}}</td>
            <td>{{$reserva->fecha_hasta}}</td>
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
