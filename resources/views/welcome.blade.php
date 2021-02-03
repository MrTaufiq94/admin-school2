<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sekolah</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
        <!-- Styles -->
        <style>
          
            body {
                /* background-image: url("{{ asset('img/index.jpg') }}"); */
                /* background-image: url("../img/index.jpg"); */
                background-image: url("http://127.0.0.1:8000/assets/img/index.jpg");
                height: 100%;
                /* background-position: center; Center the image */
                background-repeat: no-repeat; /* Do not repeat the image */
                background-size: cover; /*Resize the background image to cover the entire container */
            }
            
        </style>
    </head>
    <body>
        <div class="sini">
            @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a type="button" href="{{ route('login') }}" class="btn btn-primary">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
         <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    </body>
</html>
