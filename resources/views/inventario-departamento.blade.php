@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h5>INVENTARIO DEPARTAMENTO N° {{$departamento->numero}}</h5>
  <h5>Direccion {{$departamento->direccion}} , {{$departamento->comuna}} , {{$departamento->region}}</h5>

  <table id="tabla-historial" class="table dataTable no-footer dtr-inline collapsed table-striped" style="width:100%">
    <thead class="thead-light">
      <tr>
        <th>Nombre</th>
        <th>Detalles</th> 
        <th >Valoracion</th>
        <th>Gestionar</th> 
      </tr>
    </thead>
    <tbody>
      @foreach($inventario as $inventarios) 
      <tr>
        <td>{{$inventarios->nombre}}</td>
        <td>{{$inventarios->detalles}}</td>
        <td >{{$inventarios->valoracion}}</td>
        <td><a class="btn btn-outline-primary btn-sm" href="/modificar-inventario/{{$inventarios->id}}"> Modificar </a></td>
      </tr>
      @endforeach
    </tbody>
  </table>  
  <script>
   var dataTable = new DataTable("#tabla-historial", {
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




@endsection
