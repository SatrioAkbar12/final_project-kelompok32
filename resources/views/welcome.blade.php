<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome To Stak Operflow</title>

        <!-- Custom fonts for this template-->
        <link href="{{asset('/sbadmin2/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{asset('/sbadmin2/css/sb-admin-2.min.css')}}" rel="stylesheet">

        <style>
            .background {
                background-image: url('{{asset('/img/background_landingpage.jpeg')}}');
                background-attachment: fixed;
                background-repeat: no-repeat;
                background-size: 100%;
            }
            .landing-page{
                padding: 20% 0;
            }
            .jumbotron{
                margin:0;
            }
        </style>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-light bg-light justify-content-end">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}" class="navbar-brand mr-3 ml-3">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="navbar-brand mr-3 ml-3">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="navbar-brand mr-3 ml-3">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

        <div class="jumbotron landing-page background text-center text-light">
            <h1>Welcome to Stak Operflow!</h1>
            <h5>Kamu mencari sesuatu? Coba cek disini!</h5>
            <a href="{{ route('register') }}" class="btn btn-primary">Buat Akunmu Sekarang!</a>
        </div>
    </body>
</html>
