@extends('layouts.app')

@section('content')

<body>
<div id="banner-cover">
  <h1>ENCUENTRA TU DEPARTAMENTO</h1>
  <p>Elige entre los alojamientos que tenemos a lo largo del país!</p>
</div>

<div class="container" id="container-home">
  <h3> Los mejores destinos... </h3>
  <h7> Revise entre la variedad de departamentos que tenemos para usted en las zonas más turísticas del país </h7>
  <br>

  <!-- Carousel wrapper -->
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('/img/pucon.jpg')}} " class="d-block w-100" width="500" height="500" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div style="background-color: #f0f0f0; width:25%;position: inherit;">
            <small style="color:black;font-size: 1em; font-style:italic;" > Pucón, Región de la Araucanía </small>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/img/vina_del_mar.jpg')}} " width="500" height="500" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div style="background-color: #f0f0f0; width:28%;position: inherit;">
            <small style="color:black;font-size: 1em; font-style:italic;" >  Viña del Mar, Region de Valparaiso </small>
          </div>
        </div>
      </div>

      <div class="carousel-item">
        <img src="{{ asset('/img/punta_arenas.jpg')}} " width="500" height="500" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <div style="background-color: #f0f0f0; width:50%;position: inherit;">
            <small style="color:black;font-size: 1em; font-style:italic;" > Punta Arenas, Región de Magallanes y de la Antártica Chilena </small>
          </div>

        </div>
      </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <br>


  <h7> Encuéntrenos en las regiones mas turísticas del país, con nuestros departamentos de excelente calidad, tendrá garantizado un alojamiento al nivel que se lo merece, para una experiencia inolvidable. </h7>


</div>

</body>

<style>
  body {
    background-color: #f0f0f0;
  }
  #banner-cover {
    text-align: center;
    height: 275px;
    background-image: url("../img/big-banner.jpg");
    color: white;
  }

  #banner-cover h1 {
    padding-top: 100px;
    font-family: Impact;
    color: white;
  }

  #banner-cover p {
    font-size: 120%;
    font-weight: 500;
  }

  #container-home {
    padding-top: 25px;
    padding-bottom: 25px;

  }

  #container-home h7 {
  font-weight: 350;
  font-size: 125%;
}

  #container-home h3 {
    color: #232323; 
    font-weight:500;
  }

  .active {
    background-color: black;
  }

  small {
    padding: 3px;
  }


</style>

@endsection
