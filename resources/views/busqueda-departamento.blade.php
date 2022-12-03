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
            <th>Identificación</th>
            <th>Ubicacion</th>
            <th>Inmueble</th>
            <th>Estado</th>     
          </tr>
        </thead>
        <tbody>
          @foreach($departamentos as $departamento) 
          <tr class='clickable-row' data-href="modificar-departamento/{{$departamento->codigo_departamento}}">

            <td>
              <div class="box-datos">
                <div class="nombre-dpto">Codigo: {{$departamento->codigo_departamento}}</div>
                <div class="nombre-dpto">Nombre: {{$departamento->nombre_departamento}}</div>
                <div class="nombre-dpto">Numero: {{$departamento->numero}}</div>
              </div>
            </td>


            <td>
              <div class="box-datos">
                <div class="nombre-dpto">Direccion: {{$departamento->direccion}}</div>
                <div class="nombre-dpto">Comuna: {{$departamento->comuna}}</div>
                <div class="nombre-dpto">Region: {{$departamento->region}}</div>
              </div>
            </td>

            <td>
              <div class="box-datos">
                <div class="nombre-dpto">Dormitorios: {{$departamento->cantidad_habitaciones}}</div>
                <div class="nombre-dpto">Baños: {{$departamento->cantidad_banos}}</div>
              </div>
            </td>
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


<style>
  #myTable tbody tr:hover {
    background-color: #f3f3f3;
    cursor:pointer;
  }
</style>