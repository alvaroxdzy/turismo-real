@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h4>Listado departamentos</h4>
  <div> 
   <form class="form-text-input" type="get">

     <a href="crear-departamento" class="btn btn-outline-primary btn-sm" role="button">Crear departamento</a>

   </form>
 </div>
 <div class="row"> 
   <div class="clod-md-4"> </div>
   <div class="clod-md-6"> 
     <div class="row">   
       <table id="myTable" class="table dataTable no-footer dtr-inline collapsed">

        <thead>
          <tr>
            <th>Codigo</th>
            <th>Dirección</th>
            <th>Comuna</th>
            <th>Región</th>
            <th>Nombre</th>
            <th>Número</th>
            <th>Habitaciones</th>
            <th>Baños</th>
            <th>Estado</th>     
          </tr>
        </thead>
        <tbody>
          @foreach($departamentos as $departamento) 
          <tr class='clickable-row' data-href="modificar-departamento/{{$departamento->codigo_departamento}}">
            <td>{{$departamento->codigo_departamento}} </a></td>
            <td>{{$departamento->direccion}}</td>
            <td>{{$departamento->comuna}}</td>
            <td>{{$departamento->region}}</td>
            <td>{{$departamento->nombre_departamento}}</td>
            <td>{{$departamento->numero}}</td>
            <td>{{$departamento->cantidad_habitaciones}}</td>
            <td>{{$departamento->cantidad_banos}}</td>
            <td>{{$departamento->estado}}</td>
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
