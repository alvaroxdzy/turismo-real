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

        <tbody>
          @foreach($departamentos as $departamento) 
          <tr>
            <td style="width:240px;">
              <img class="miniatura" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzYGdJMf9acTXCn387AkZts7qk_B9kHxjTgVeHsEb9-Vs6IeHxA_o3-OLGFtHJls9OgRw&usqp=CAU">
            </td>
            <td style="width:600px;"> 
              <div class="box-datos">
                <div class="nombre-dpto"> {{$departamento->nombre_departamento}}</div>
                <div class="texto"> &#128205;  {{$departamento->direccion}} </div>
                <div class="texto"> &#127970; {{$departamento->numero}} </div> 	
                <div class="texto"> &#128506; {{$departamento->region}} </div> 	
              </div>
            </td>
            <td>
              <div class="box1"> <div class="cia ">Turismo Real</div>
                <table>
                  <td > <div class="precio">${{$departamento->costo_base}}</div></td>
                  <td> <div class=""> <button> Ver detalle &#10095; </button></div></td>
                </table>
              </div>
              <div>
                <table>
                  <td > <div class="box2"> Habitaciones: {{$departamento->cantidad_banos}} </div></td>
                  <td> <div class="box2"> Baños:  {{$departamento->cantidad_habitaciones}}</div></td>
                </table>
              </div>
            </td>

          </td>

           
</button>  </td>
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

  .miniatura {
    border-radius: 7px;
    height: 180px;
    width: 240px;
    margin: 5px;
  }

  .cia {
    padding-top: 5px;
    margin-left: 20px;
    color: #232323;
    font-family: "Calibri";
    font-size: small;
    font-weight: bold;
  }

  .precio {
    margin-top: 48px;
    margin-left: 20px;
    font-weight: bold;
    color: green;
    font-size: 150%;
    font-family: Helvetica;
  }

  .box-datos {
    margin-top: 30px;
    margin-left: 30px;
  }

  .box1 {
    margin-top: 10px;
    margin-left: 20px;
    margin-bottom: 10px;
    background: #cbfac4;
    border-radius: 5px;
    height: 120px;
    width: 400px;
  }

  .box2 {
    margin-left: 20px;
    border-radius: 5px;
    background: #f1f1f1;
    height: 40px;
    width: 190px;
    padding: 5px;
    text-align: center;
    color: #606060;
    font-weight: 200;
    font-size: 110%;
  }

  button {
    margin-top: 45px;
    margin-left: 145px;
    border: none;
    border-radius: 10px;
    background-color: green;
    color: #eeeeee;
    padding: 7px 23px;
    font-family: Helvetica;
    font-size: medium;
    font-weight: bold;

  }

  button:hover {
    color: #eeeeee;
    background-color: #006f00;

  }

  .nombre-dpto {
    font-size: large;
    font-weight: bold;
    margin-bottom: 30px;
  }

  .texto {
    font-size: medium;
    margin-top: 3px;
    margin-left: 15px;
    color: #606060;
    font-weight: 400;
  }
</style>

@endsection
