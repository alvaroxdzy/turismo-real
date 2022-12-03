</head>
<body style="font-family: Helvetica; color: #232323;">
  <main>
    <div  class="container"> 
     <div class="card" >
      <h3 style="width:30%"> Turismo Real</h3>
    </div>

  <!-- ESTA TABLA ES TODA LA INFO EXCEPTO LA WEA HORRENDA QUE ESTA ABAJO DE SERVICIOS ADICIONALES-->
  <table>
    <td style="width: 650px; padding-right:25px;">
    <div class="title-sect"> Datos del Departamento </div><hr>

    <!-- ESTA TABLA ES LA DE INFO DPTO -->
    <table class="info">
      <tr>
        <td>Departamento : {{$departamento->nombre_departamento}}</td>
        <td>Costo diario : ${{$departamento->costo_base}} </td>
      </tr>

      <tr>
        <td>Direccion : {{$departamento->direccion}}</td>
        <td>Numero : {{$departamento->numero}}</td>
      </tr>

      <tr>
        <td>Comuna : {{$departamento->comuna}}</td>
        <td>Region : {{$departamento->region}}</td>
      </tr>

      <tr>
        <td>Habitaciones : {{$departamento->cantidad_habitaciones}}</td>
        <td>Baños : {{$departamento->cantidad_banos}}</td>
      </tr>

      <tr>
        <td></td>
        <td></td>
      </tr>

    </table><br>    

    <div class="title-sect"> Datos del Huesped </div><hr>

    <!-- ESTA TABLA ES LA DE INFO HUESPED -->
    <table class="info">
      <tr>
        <td>Nombres :</td>
        <td>{{$usuario->nombres}}</td>
      </tr>

      <tr>
        <td>Apellidos : </td>
        <td>{{$usuario->apellidos}}</td>
      </tr>

      <tr>
        <td>Rut : </td>
        <td>{{$usuario->rut}}</td>
      </tr>

      <tr>
        <td>Teléfono :</td>
        <td>{{$usuario->telefono}} </td>
      </tr>

      <tr>
        <td>Email :</td>
        <td>{{$usuario->email}}</td>
      </tr>

    </table><br> 


    <div class="title-sect">Datos de la Reserva</div><hr>

    <!-- ESTA TABLA ES LA DE INFO RESERVA -->
    <table class="info">
      <tr>
        <td>ID Reserva:</td>
        <td>{{$reserva->id}}</td>
      </tr>

      <tr>
        <td>Codigo departamento: </td>
        <td>{{$reserva->cod_departamento}}</td>
      </tr>

      <tr>
        <td>Fecha desde:</td>
        <td>{{$reserva->fecha_desde}} </td>
      </tr>

      <tr>
        <td>Fecha hasta:</td>
        <td>{{$reserva->fecha_hasta}} </td>
      </tr>

      <tr>
        <td>Costo base arriendo:</td>
        <td>${{$reserva->costo_base}}</td>
      </tr>

    </table><br>     
  
    </td> <!--no me borri pq soy el cierre de la primera columna, aweonaito-->

    <!-- ESTA COLUMNA ES LA DE RESUMEN RESERVA-->
    <td style="border-left: 1px solid #444444; background-color:#eef1f5; width: 300px; padding-right:20px; padding-left:20px;">
      <div class="title-res"> Resumen Reserva</div><hr>

      <table class="resumen">
      <tr>
        <td>Fecha desde </td>
        <td style="text-align:right;"> {{$reserva->fecha_desde}}</td>
      </tr>

      <tr>
        <td>Fecha hasta </td>
        <td style="text-align:right;">{{$reserva->fecha_hasta}}</td>
      </tr>

      <tr>
        <td>N° de días</td>
        <td style="text-align:right;">{{$diferencia_en_dias}}</td>
      </tr>
      </table >
      <hr>

      <table>
      <tr>
        <td>Subtotal</td>
        <td style="text-align:right; font-weight: bold;">${{$reserva->costo_base}}</td>
      </tr>

      <tr>
        <td style="width:200px">Servicios Adicionales</td>
        <td style="width:100px; text-align:right; font-weight: bold;">${{$costo_servicios}}</td>
      </tr>
      </table>
      <hr>
      <table class="resumen">

      <tr style="font-weight: bold;">
        <td>Total</td>
        <td style="text-align:right;">${{$total}}</td>
      </tr>

      </table>   
    </td> 

  </table>


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

<style>
  .resumen td {
    width: 150px;
  }

  .title-res {
    color: #232323;
    padding-top: 25px;
    font-weight: 100;
    text-align: center;
    font-size: large;
  }

  .title-sect {
    color: #232323;
    text-align: left;
    font-size: large;
    font-weight: bold;
  }

  .info td {
    width: 325px;
  }
</style>

