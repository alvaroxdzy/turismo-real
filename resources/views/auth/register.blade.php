<!doctype html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">



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

    <title> Turismo real </title>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container" id="app">
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        Turismo Real </a>
                </div>
    </nav>
    
    <div class="container" style="padding: 35px 200px;" >

        <div class="card border-info mb-3" style="width:100%" >
            <div class="card-header">{{ __('Registro') }}</div>
            <form method="POST" id="guardar" action="{{ route('register') }}">
                @csrf
                <div class="card-body">


                    <div class="row" > 
                        <div class="mb-2 col-md-3">
                            <label for="email" >{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2 col-md-2" >
                            <label for="rut" > Rut </label>
                            <input id="rut" type="text" class="form-control" name="rut" required >
                            <small class="form-text text-muted">formato 11222333-1</small>
                        </div>
                    </div>


                    <div class="row" > 
                       <div class="mb-2 col-md-3">
                        <label for="nombres" >{{ __('Nombres') }}</label>
                        <input id="nombres" type="text" class="form-control" name="nombres"  required >
                    </div>
                    <div class="mb-2 col-md-3">
                        <label for="apellidos" >{{ __('Apellidos') }}</label>
                        <input id="apellidos" type="text" class="form-control" name="apellidos"  required >                                 
                    </div>
                </div>

                <div class="row">
                    <div class="mb-2 col-md-3">
                        <label for="fecha_nacimiento">{{ __('Fecha nacimiento') }}</label>
                        <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento"  required >
                    </div>

                    <div class="row">
                        <div class="mb-2 col-md-5">

                            <label for="direccion" >{{ __('Direccion') }}</label>

                            <input id="direccion" type="text" class="form-control" name="direccion"  required >
                        </div>



                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label for="telefono" >{{ __('Telefono') }}</label>
                                <input id="telefono" type="text" class="form-control" name="telefono" onkeypress="return valideKey(event);" required > 
                            </div>

                        </div>



                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label for="password" >{{ __('Contraseña') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <small class="form-text text-muted">Minimo 8 caracteres</small>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-2 col-md-4">
                                <label for="password-confirm" >{{ __('Confirmar contraseña') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <input class="btn btn-primary sm" onclick="validarCampos()" value="Registrarse">  </input>
                        </div>
                    </div>
                </form>
            </div>

        </div>
