@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h4>Lista de servicios extras</h4>
  <div> 
   <form class="form-text-input" type="get">

     <a href="crear-servicio" class="btn btn-outline-primary btn-sm" role="button">Registrar servicio</a>

   </form>
 </div>
 <div class="row"> 
   <div class="clod-md-4"> </div>
   <div class="clod-md-6"> 
     <div class="row">   
       <table id="myTable" class="table dataTable no-footer dtr-inline collapsed">

        <thead>
          <tr>
            <th>ID</th>
            <th>Nombre </th>
            <th>Detalles</th>
            <th>Precio</th>        
          </tr>
        </thead>
        <tbody>
          @foreach($servicios as $servicio) 
          <tr class='clickable-row' data-href="modificar-servicio/{{$servicio->id}}">            
            <td>{{$servicio->id}} </td>
            <td>{{$servicio->nombre_servicio}}</td>
            <td>{{$servicio->detalles}}</td>
            <td>{{$servicio->precio}}</td>
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
    <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".clickable-row").click(function() {
          window.location = $(this).data("href");
        });
      });
    </script>


  </div> 
</div> 
</div> 
</div>      
</div>  


@endsection

<style>
  #myTable tbody tr:hover {
  background-color: #f3f3f3;
  cursor:pointer;
}
</style>