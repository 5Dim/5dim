<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-48H6GVNCJ4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-48H6GVNCJ4');

    </script>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Quinta Dimension</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">


    <!-- Icons Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/customPpal.css') }}" rel="stylesheet">

    <!-- Select2 -->
    <link href="{{ asset('css/select2/select2.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/select2/select2-bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/bootstrap/carousel.css') }}" media="all" rel="stylesheet" type="text/css" />

</head>

<body class="bg text-center">
    <div id="app">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand text-white" href="{{ url('/') }}">
                    <img src="{{ asset('favicon.png') }}" alt="" width="50" height="50"
                        class="d-inline-block align-text-middle">
                    Quinta Dimension
                </a>
                @auth
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </button>

                        <div class="dropdown-menu bg-dark" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item bg-dark text-light" href="{{ url('/home') }}">Acceder a los
                                universos</a>
                            <a class="dropdown-item bg-dark text-light"
                                href="{{ url('/configuracion') }}">Configuracion</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="dropdown-item bg-dark text-danger" href="{{ url('/logout') }}"
                                    onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
                            </form>
                        </div>
                    </div>
                @endauth
                @guest
                    <div class="col-md-3 text-end">
                        <a class="" href="{{ url('/login') }}"><button type="button"
                                class="btn btn-primary me-2">Login</button></a>
                        <a class="" href="{{ url('/register') }}"><button type="button"
                                class="btn btn-primary">Registrar</button></a>
                    </div>
                @endguest
            </div>
        </nav>
    </div>
    <main class="text-white">
        @yield('content')
    </main>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    <!-- Select2 -->
    <script src="{{ asset('js/select2/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#timezone').select2({
                placeholder: "Nombre del planeta",
                width: '100%',
                language: "es"
            });
            $('#idioma').select2({
                placeholder: "Nombre del planeta",
                width: '100%',
                language: "es"
            });
        });

    </script>
    @include('cookie-consent::index')
</body>

</html>
