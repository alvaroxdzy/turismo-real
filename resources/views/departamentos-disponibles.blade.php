@extends('layouts.app')

@section('content')



<div  class="container"> 
  <h4>Departamentos disponibles</h4>
  <div> 

  </div>
  <div class="row"> 
   <div class="clod-md-4"> </div>
   <div class="clod-md-6"> 
     <div class="row">   
       <table id="myTable" class="table table-sm"  style="width:100%">

        <thead>
          <tr>
            <th>Dirección</th>
            <th>Región</th>
            <th>Comuna</th>
            <th>Número</th>
            <th>Habitaciones</th>
            <th>Baños</th>
            <th>Costo/Diario</th>
            <th>Reservar</th>     
          </tr>
        </thead>
        <tbody>
          @foreach($departamentos as $departamento) 
          <tr>
            <td>{{$departamento->direccion}}</td>
            <td>{{$departamento->region}}</td>
            <td>{{$departamento->comuna}}</td>
            <td>{{$departamento->numero}}</td>
            <td>{{$departamento->cantidad_habitaciones}}</td>
            <td>{{$departamento->cantidad_banos}}</td>
            <td>${{$departamento->costo_base}}</td>
            <td> <button class="btn btn-primary btn-sm" >
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> 
</button>  </td>
          </tr>
          <tr>
            <td>
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzYGdJMf9acTXCn387AkZts7qk_B9kHxjTgVeHsEb9-Vs6IeHxA_o3-OLGFtHJls9OgRw&usqp=CAU">
            </td>
            <td>
              <div>dfgsdg</div>
              <div>soy el 2</div>
              <div> &#128506; &#128205; soy el 3</div>
            </td>
            <td>
              <div class="box1">soy el 1</div>
              <div>
                <table>
                  <td > <div class="box2">&#128701; baño </div></td>
                  <td> <div class="box2"> &#x1F6AA; {{$departamento->cantidad_habitaciones}}</div></td>
                </table>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>  
      <script>
       var dataTable = new DataTable("#myTable", {
        perPage: 25,
        sortable: true,
        fixedColumns: false,
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

<style type="text/css">
  .box1 {
    background: green;
    border-radius: 5px;
    height: 50px;
  }

  .box2 {
    border: 2px solid gray;
    border-radius: 5px;
    background: lightgray;
  }
</style>

@endsection
