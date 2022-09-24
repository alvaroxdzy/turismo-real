@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h4>Listado departamentos</h4>
  <div> 
   <form class="form-text-input" type="get">

     <a href="crear-mantencion" class="btn btn-outline-primary btn-sm" role="button">Registrar mantencion</a>

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
            <th>Departamento</th>
            <th>Fecha</th>
            <th>Encargado</th>
            <th>Observaciones</th>
            <th>Usuario</th>
            <th>Gestionar</th>        
          </tr>
        </thead>
        <tbody>
          @foreach($mantenciones as $mantencion) 
          <tr>
            <td>{{$mantencion->codigo_mantencion}} </td>
            <td>{{$mantencion->cod_departamento}}</td>
            <td>{{$mantencion->fecha}}</td>
            <td>{{$mantencion->encargado}}</td>
            <td>{{$mantencion->observaciones}}</td>
            <td>{{$mantencion->usuario}}</td>
            <td><a class="btn btn-outline-primary btn-sm" href="modificar-mantencion/{{$mantencion->codigo_mantencion}}"> Modificar </a></td>
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
</div>  


@endsection
