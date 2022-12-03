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
        <div class="card-header">Registro Turismo Real</div>
        <form method="POST" id="guardar" action="{{ route('register') }}">
            @csrf
            <div class="card-body">


                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="email">Correo @</label>
                    <div class="col-sm-5">
                        <input  type="email" class="form-control" id="email" name="email"  required >
                    </div>
                </div>

                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="rut">Rut</label>
                    <div class="col-sm-5">
                        <input  type="text" class="form-control" id="rut" name="rut"  required >
                    </div>
                </div>
                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="nombres">Nombres</label>
                    <div class="col-sm-5">
                        <input  type="text" class="form-control" id="nombres" name="nombres"  required >
                    </div>
                </div>

                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="apellidos">Apellidos</label>
                    <div class="col-sm-5">
                        <input  type="text" class="form-control" id="apellidos" name="apellidos"  required >
                    </div>
                </div>
                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="fecha_nacimiento">Fecha nacimiento</label>
                    <div class="col-sm-5">
                        <input  type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento"  required >
                    </div>
                </div>
                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="direccion">Dirección</label>
                    <div class="col-sm-5">
                        <input  type="text" class="form-control" id="direccion" name="direccion"  required >
                    </div>
                </div>
                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="telefono">Telefono</label>
                    <div class="col-sm-5">
                        <input  type="text" class="form-control" id="telefono" name="telefono"  required >
                    </div>
                </div>

                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="password">Contraseña</label>
                    <div class="col-sm-5">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                        <small class="form-text text-muted">Minimo 8 caracteres</small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-2 row">
                    <label  class="col-2 col-form-label" for="password-confirm">Confirmar Contraseña</label>
                    <div class="col-sm-5">
                         <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
