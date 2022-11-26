<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Turismo real </title>

        <!-- Scripts Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


        <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


        <!-- Development popperjs version -->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"> </script> -->
        <!-- <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.js"></script> -->
        <!-- Production popperjs version -->
        <!--<script src="https://unpkg.com/@popperjs/core@2"></script>-->


        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Datatables vanilla -->
        <link href="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <style type="text/css"></style>
    </head>

    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container" id="container-nav">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Turismo real
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="nav justify-content-end" id="ul_layout">

                          <li id="li_layout" class="nav-item dropdown">
                            <!--
                            <a id="navbarDropdown" class="nav-link dropdown-toggle font-small"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" >Movimientos </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/crear-movimiento"> Ingreso bodega  </a> 
                                <a class="dropdown-item" href="/salida-movimiento"> Salida bodega </a> 
                            </div> 
                        -->

                        <li id="li_layout" class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle font-small"  role="button" data-bs-toggle="dropdown" aria-haspopup="true" href="/bodegas"> Mantenedores  </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/buscar-departamento"> Departamento </a> 
                                <a class="dropdown-item" href="/buscar-mantencion"> Mantenciones  </a> 
                                <a class="dropdown-item" href="/buscar-servicio"> Servicio </a> 
                            </div>     
                            <li id="li_layout"><a class="nav-link" href="/departamentos-disponibles" id="linkLayout" >Reservar</a></li>                
                        </ul>


                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                            @endif

                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                            @endif
                            @else


                            <div >
                                <marquee  >
                                 Bienvenido : {{ Auth::user()->nombres }}
                             </marquee>
                             
                             <h6><a class="link-secondary" style="display:block;text-align:right;"  href="{{ url('/mi-cuenta') }}">Mi cuenta</a></h6>

                             <h6><a class="link-secondary" style="display:block;text-align:right;"  href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                 {{ __('Cerrar sesion') }}
                             </a></h6>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" >
        @yield('content')
    </main>
</div>
</body>
</html>
