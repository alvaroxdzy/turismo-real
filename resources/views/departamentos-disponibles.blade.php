@extends('layouts.app')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>


<style>
  .carousel-multi-item.v-2.product-carousel .carousel-item-right.active,
  .carousel-multi-item.v-2.product-carousel .carousel-item-next {
    -webkit-transform: translateX(25%);
    -ms-transform: translateX(25%);
    transform: translateX(25%); }
    .carousel-multi-item.v-2.product-carousel .carousel-item-left.active,
    .carousel-multi-item.v-2.product-carousel .carousel-item-prev {
      -webkit-transform: translateX(-25%);
      -ms-transform: translateX(-25%);
      transform: translateX(-25%); }
      .carousel-multi-item.v-2.product-carousel .carousel-item-right,
      .carousel-multi-item.v-2.product-carousel .carousel-item-left {
        -webkit-transform: translateX(0);
        -ms-transform: translateX(0);
        transform: translateX(0); }

        @media (max-width: 991px){
          .carousel-multi-item.v-2.product-carousel .carousel-item-right.active,
          .carousel-multi-item.v-2.product-carousel .carousel-item-next {
            -webkit-transform: translateX(50%);
            -ms-transform: translateX(50%);
            transform: translateX(50%); }
            .carousel-multi-item.v-2.product-carousel .carousel-item-left.active,
            .carousel-multi-item.v-2.product-carousel .carousel-item-prev {
              -webkit-transform: translateX(-50%);
              -ms-transform: translateX(-50%);
              transform: translateX(-50%); }
              .carousel-multi-item.v-2.product-carousel .carousel-item-right,
              .carousel-multi-item.v-2.product-carousel .carousel-item-left {
                -webkit-transform: translateX(0);
                -ms-transform: translateX(0);
                transform: translateX(0); }
              }

              @media (max-width: 768px){
                .carousel-multi-item.v-2.product-carousel .carousel-item-right.active,
                .carousel-multi-item.v-2.product-carousel .carousel-item-next {
                  -webkit-transform: translateX(100%);
                  -ms-transform: translateX(100%);
                  transform: translateX(100%); }
                  .carousel-multi-item.v-2.product-carousel .carousel-item-left.active,
                  .carousel-multi-item.v-2.product-carousel .carousel-item-prev {
                    -webkit-transform: translateX(-100%);
                    -ms-transform: translateX(-100%);
                    transform: translateX(-100%); }
                    .carousel-multi-item.v-2.product-carousel .carousel-item-right,
                    .carousel-multi-item.v-2.product-carousel .carousel-item-left {
                      -webkit-transform: translateX(0);
                      -ms-transform: translateX(0);
                      transform: translateX(0); }
                    }

                    .card {
                      box-shadow:none; 
                      cursor:pointer;
                      border:solid 1px #d9d8d8;
                      border-radius:8px!important
                    }
                    .card-body {
                      background:#eeeeee;
                      border-radius:8px!important
                    }
                    .carousel-multi-item .controls-top {
                      text-align: right;
                      font-weight:500;
                      font-size:14px;
                      margin-bottom: .2rem;
                      margin-right:20px;
                    }

                    .card-circ {
                      height: 63px;
                      width:63px;
                      border-radius:50%;
                      background:#fff;
                      padding-top:15px;
                      margin-bottom:15px;
                    }
                    .card-circ i {
                      font-size:32px;
                    }
                    .card-title {
                      padding-top: 40px;
                      padding-bottom: 70px;
                      text-align: left;
                      font-weight: bold;
                      margin-left: 5px;
                      
                    }
                    a {
                      color:#000000;
                      text-decoration:none;
                    }
                    a:hover {
                      color:#000000;
                    }

                    .grid {
                      display: grid;
                      grid-template-columns: 100% 5%;
                      align-items: center;
                    }

                    .link {
                      margin-left: -95px;
                      font-weight: bold;
                      color: gray;
                    }

                    f {
                      color: lightgray;
                      font-size: 200%;
                      
                    }

                    .container {
                      margin-bottom: 50px;
                    }
                  </style>

                  <div class="container pt-5">

                    <section>
                      
                      <div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 product-carousel" data-ride="carousel">
                        
                        <!--Controls-->
                        <div class="grid">


                          <!--/.Controls-->
                          
                          <div class="carousel-inner v-2" role="listbox">
                            
                            <div class="carousel-item active py-3">
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card mb-2" onclick="location.href='{% url 'list' %}?categoria=Fantasma'">
                                  <div class="card-body text-center">
                                    <img class="card-img-top" src="https://www.larazon.es/resizer/2zYiPj_aXxESSajAv6PgN91OBHk=/1260x840/smart/filters:format(jpg)/cloudfront-eu-central-1.images.arcpublishing.com/larazon/IQB2IOQU2JCAHISTUKVIN7WCIA.jpeg"
                                    alt="Card image cap" height="180px">
                                    <div class=""></div>
                                    <h4 class="card-title">Fantasmas</h4>
                                    <a class="link"> Ver publicaciones &#8594;</a>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="carousel-item py-3">
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card mb-2" onclick="location.href='{% url 'list' %}?categoria=Ovni'">
                                  <div class="card-body text-center">
                                    <img class="card-img-top" src="https://media.biobiochile.cl/wp-content/uploads/2022/11/ovnis.jpg"
                                    alt="Card image cap" height="180px">
                                    <div class=""></div>
                                    <h4 class="card-title">Ovnis</h4>
                                    <a class="link"> Ver publicaciones &#8594;</a>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="carousel-item py-3">
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card mb-2" onclick="location.href='{% url 'list' %}?categoria=Críptido'">
                                  <div class="card-body text-center">
                                    <img class="card-img-top" src="https://pbs.twimg.com/media/D1jo-frWwAA01-n?format=jpg&name=large"
                                    alt="Card image cap" height="180px">
                                    <div class=""></div>
                                    <h4 class="card-title">Críptidos</h4>
                                    <a class="link"> Ver publicaciones &#8594;</a>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="carousel-item py-3">
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card mb-2" onclick="location.href='{% url 'list' %}?categoria=Poltergeist'">
                                  <div class="card-body text-center">
                                    <img class="card-img-top" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Baulmonje.jpg/400px-Baulmonje.jpg"
                                    alt="Card image cap" height="180px">
                                    <div class=""></div>
                                    <h4 class="card-title">Poltergeists</h4>
                                    <a class="link"> Ver publicaciones &#8594;</a>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="carousel-item py-3">
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card mb-2" onclick="location.href='{% url 'list' %}?categoria=Duende'">
                                  <div class="card-body text-center">
                                    <img class="card-img-top" src="https://qph.cf2.quoracdn.net/main-qimg-8f0f973e48fc3135c25ba343a8ccc521-lq"
                                    alt="Card image cap" height="180px">
                                    <div class=""></div>
                                    <h4 class="card-title">Duendes</h4>
                                    <a class="link"> Ver publicaciones &#8594;</a>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                              </div>
                            </div>


                            <div class="carousel-item py-3">
                              <div class="col-12 col-lg-3 col-md-6">
                                <div class="card mb-2" onclick="location.href='{% url 'list' %}?categoria=Otro'">
                                  <div class="card-body text-center">
                                    <img class="card-img-top" src="https://imagenes.t13.cl/images/original/2016/03/1457726837-150220wnmuir016x9992.jpg?width=670&dpr=2"
                                    alt="Card image cap" height="180px">
                                    <div class=""></div>
                                    <h4 class="card-title">Otros</h4>
                                    <a class="link"> Ver publicaciones &#8594;</a>
                                    <p class="card-text"></p>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>
                          <div class="controls-top">
                            <a href="#carousel-example-multi" data-slide="next"><f> &#10095; </f></a>

                          </div>
                        </div>
                      </div>
                      
                    </section>
                    
                  </div>

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
                            @endforeach
                          </tbody>
                        </table>  
                        <script>
                         var dataTable = new DataTable("#myTable", {
                          perPage: 5,
                          sortable: true,
                          fixedColumns: false,
                          perPageSelect: [5, 10, 25, 50],
                          labels: {
                            placeholder: "Buscar..",
                            perPage: "{select}     Registros por pagina",
                            noRows: "No se encontraron registros",
                            info: "Mostrando registros del {start} hasta el {end} de un total de {rows} registros",
                          }

                        });
                      </script>

                      <script>
                        $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
                          var next = $(this).next();
                          if (!next.length) {
                            next = $(this).siblings(':first');
                          }
                          next.children(':first-child').clone().appendTo($(this));
                          
                          for (var i=0;i<2;i++) {
                            next=next.next();
                            if (!next.length) {
                              next=$(this).siblings(':first');
                            }
                            next.children(':first-child').clone().appendTo($(this));
                          }
                        });
                      </script>

                    </div> 
                  </div> 
                </div> 
              </div>      
            </div>  


            @endsection
