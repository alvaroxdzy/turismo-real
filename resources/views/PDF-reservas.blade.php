</head>
<body>
  <main>
    <div  class="container"> 
     <div class="card" >
      <h3 style="width:30%"> Turismo Real</h3>
    </div>

    <h3 style="text-align:center"> Historico de reservas </h3>

<label> Fecha desde {{$reserva->fecha_desde}} </label>
<br>
<label> Fecha desde {{$reserva->fecha_hasta}} </label>
<br>
<label> Departamento : {{$departamento->nombre_departamento}} </label>
<br>
<label> Direccion : {{$departamento->direccion}} </label>
<br>
<label> Comuna : {{$departamento->comuna}} </label>
<br>
<label> Region : {{$departamento->region}} </label>
<br>

<label> Numero : {{$departamento->numero}} </label>
<br>
<label> Habitaciones : {{$departamento->cantidad_habitaciones}} </label>
<br>
<label> Baños : {{$departamento->cantidad_banos}} </label>
<br>
<label> Costo diario : ${{$departamento->costo_base}} </label>
<br>
<label> Nombres : {{$usuario->nombres}}  </label>
<br>
<label> Apellidos : {{$usuario->apellidos}}  </label>
<br>
<label> Rut : {{$usuario->rut}}  </label>
<br>
<label> Telefono : {{$usuario->telefono}}  </label>
<br>
<label> Email : {{$usuario->email}}  </label>


<table id="myTable" class="table dataTable no-footer dtr-inline collapsed table-striped" style="width:100%">
  <thead class="thead-light">
    <tr>
      <th>Id</th>
      <th>Codigo departamento</th>
      <th>Costo base</th> 
    </tr>
  </thead>
  <tbody id="trTable">
   
    <tr>
      <td>{{$reserva->id}}</td>
      <td>{{$reserva->cod_departamento}}</td>
      <td>${{$reserva->costo_base}}</td>
    </tr>
  </tbody>
</table>  

