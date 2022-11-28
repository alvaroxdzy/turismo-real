</head>
<body>
  <main>
    <div  class="container"> 
     <div class="card" >
      <h3 style="width:30%"> Turismo Real</h3>
    </div>

    <h3 style="text-align:center"> Vale necesito tu ayuda porfavor!!! </h3>



    <h5> DEPARTAMENTO</h5>

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

    <h5> PERSONA</h5>

    <label> Nombres : {{$usuario->nombres}}  </label>
    <br>
    <label> Apellidos : {{$usuario->apellidos}}  </label>
    <br>
    <label> Rut : {{$usuario->rut}}  </label>
    <br>
    <label> Telefono : {{$usuario->telefono}}  </label>
    <br>
    <label> Email : {{$usuario->email}}  </label>

    <h5>RESERVA</h5>

    <label> ID Reserva : {{$reserva->id}}</label>
    <br>
    <label> Codigo departamento : {{$reserva->cod_departamento}}</label>
    <br>
    <label> Fecha desde {{$reserva->fecha_desde}} </label>
    <br>
    <label> Fecha desde {{$reserva->fecha_hasta}} </label>
    <br>
    <label> Costo base arriendo: ${{$reserva->costo_base}}</label>
    <br>


    <table id="myTable" class="table dataTable no-footer dtr-inline collapsed table-striped" style="width:100%">
      <thead class="thead-light">
        <tr>
          <th>Servicios extras solicitados</th> 
        </tr>
      </thead>
      @foreach($servicio as $ss) 
      <tbody id="trTable">

        <tr>

          <td>{{$ss->nombre_servicio}}</td>
          <td>{{$ss->detalles}}</td>
          <td>${{$ss->precio}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>  

