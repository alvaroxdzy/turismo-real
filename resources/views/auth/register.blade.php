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


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" id="guardar" action="{{ route('register') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="rut" class="col-md-4 col-form-label text-md-end"> Rut </label>
                                <div class="col-md-6">
                                    <input id="rut" type="text" class="form-control" name="rut" required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="dig_rut" class="col-md-4 col-form-label text-md-end"> Digito verificador </label>
                                <div class="col-md-6">
                                    <input id="dig_rut" type="text" class="form-control " name="dig_rut" maxlength="1"  required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nombres" class="col-md-4 col-form-label text-md-end">{{ __('Nombres') }}</label>
                                <div class="col-md-6">
                                    <input id="nombres" type="text" class="form-control" name="nombres"  required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="apellidos" class="col-md-4 col-form-label text-md-end">{{ __('Apellidos') }}</label>

                                <div class="col-md-6">
                                    <input id="apellidos" type="text" class="form-control" name="apellidos"  required >                                 
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="fecha_nacimiento" class="col-md-4 col-form-label text-md-end">{{ __('Fecha nacimiento') }}</label>
                                <div class="col-md-6">
                                    <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento"  required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="direccion" class="col-md-4 col-form-label text-md-end">{{ __('Direccion') }}</label>
                                <div class="col-md-6">
                                    <input id="direccion" type="text" class="form-control" name="direccion"  required >
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="region" class="col-md-4 col-form-label text-md-end">{{ __('Region') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="regiones" name="region"></select>
                                </div>                       
                            </div>

                            <div class="row mb-3">
                                <label for="comuna" class="col-md-4 col-form-label text-md-end">{{ __('Comuna') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="comunas" name="comuna"></select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="telefono" class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>
                                <div class="col-md-6">
                                    <input id="telefono" type="text" class="form-control" name="telefono" onkeypress="return valideKey(event);" required > 
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <input class="btn btn-primary sm" onclick="validarCampos()" value="Registrar">  </input>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

