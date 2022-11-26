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
            <td>
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQzYGdJMf9acTXCn387AkZts7qk_B9kHxjTgVeHsEb9-Vs6IeHxA_o3-OLGFtHJls9OgRw&usqp=CAU">
            </td>
            <td> 
              <div class="box-datos">
                <div> {{$departamento->nombre_departamento}} </div>
                <div> &#128205; Direccion </div>
                <div> &#128506; Region</div>
              </div>
            </td>
            <td>
              <div class="box1"> <div class="cia ">Turismo Real</div>
                <table>
                  <td > <div class="precio">${{$departamento->costo_base}}</div></td>
                  <td> <div class=""> <button> Ver oferta &#10095; </button></div></td>
                </table>
              </div>
              <div>
                <table>
                  <td > <div class="box2">&#128701; baño </div></td>
                  <td> <div class="box2"> &#x1F6AA; {{$departamento->cantidad_habitaciones}}</div></td>
                </table>
              </div>
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

  .cia {
    padding-top: 5px;
    margin-left: 20px;
    color: #232323;
    font-family: "Calibri";
    font-size: small;
    font-weight: bold;
  }

  .precio {
    margin-top: 30px;
    margin-left: 20px;
    font-weight: bold;
    color: green;
    font-size: 150%;
    font-family: Helvetica;
  }

  .box-datos {
    width: 250px;
  }

  .box1 {
    margin: 30px;
    background: #cbfac4;
    border-radius: 5px;
    height: 100px;
    width: 400px;
  }

  .box2 {
    margin-left: 20px;
    border: 2px solid gray;
    border-radius: 5px;
    background: #eeeeee;
    height: 50px;
    padding: 10px;
    font-size: 175%;
  }

  button {
    margin-top: 27px;
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
</style>

@endsection
