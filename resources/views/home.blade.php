@extends('layouts.app')

@section('content')


<div class="container">
    <h3> Encuentre su proximo destino</h3>
    <h7> Revise entre la variedad de departamentos que tenemos para usted en las zonas mas turisticas del pais </h7>
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
        <h4 style="color:#000000">Pucón, Región de Araucanía</h5>

      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/img/vina_del_mar.jpg')}} " width="500" height="500" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4 style="color:#000000" >Viña del mar, Region valparaiso</h5>

      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/img/punta_arenas.jpg')}} " width="500" height="500" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h4 style="color:#000000">Punta Arenas, Región de Magallanes y de la Antártica Chilena </h5>
        
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


<h7> Encuentrenos en las regiones mas turisticas del pais , con nuestros departamentos de excelente calidad, tendrá garantizado un alojamiento al nivel que se lo merece, para una experiencia inolvidable. </h7>
 
</div>


@endsection
