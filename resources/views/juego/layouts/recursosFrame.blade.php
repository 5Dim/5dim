<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    @if (strpos(Request::fullUrl(), 'construccion'))
        <title>Construcciones - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'investigacion'))
        <title>Investigaciones - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'planeta'))
        <title>Planeta - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'fuselajes'))
        <title>Fuselajes - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'fabricas'))
        <title>Fábricas - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'astrometria'))
        <title>Astrometría - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'flotas'))
        <title>Flotas - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'banco'))
        <title>Banco - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'comercio'))
        <title>Comercio - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'general'))
        <title>General - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'alianza'))
        <title>Alianzas - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'mensajes'))
        <title>Mensajes - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'estadisticas'))
        <title>Estadísticas - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'tienda'))
        <title>Tienda - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'politica'))
        <title>Políticas - Quinta Dimension</title>
    @else
        <title>Quinta Dimension</title>
    @endif
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FL8GT18W0Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FL8GT18W0Q');
    </script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Icons Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />

    <!-- CKEditor -->
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

    <!-- Select2 -->
    <link href="{{ asset('css/select2/select2.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/select2/select2-bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />

    <!-- NoUISlider -->
    <link href="{{ asset('css/nouislider/nouislider.min.css') }}" media="all" rel="stylesheet" type="text/css" />

    <!-- Custom -->
    <link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css" />


    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100vh !important;
            width: 300px;
            position: relative;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            overflow-y: auto;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav>a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .card-text>a {
            text-decoration: none;
            /* font-size: 20px; */
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav footer a {
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav button {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            /* font-size: 20px; */
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .boton-menu {
            font-size: 30px;
            cursor: pointer;
            position: fixed;
            padding: 10px;
        }

        @media screen and (max-width: 1500px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav>a {
                font-size: 18px;
            }

            .sidenav {
                height: 100vh !important;
                width: 0;
                position: fixed;
                z-index: 1;
                top: 0;
                left: 0;
                background-color: #111;
                overflow-x: hidden;
                transition: 0.5s;
                padding-top: 60px;
            }
        }

        .notification {
            position: relative;
            font-size: 14px;
            top: -22px;
            left: -15px;
        }

    </style>
</head>

<body class="bg" id="recursosFrame" style="overflow: hidden">
    <div class="d-flex flex-row">
        <div class="d-flex flex-column">
            <span class="text-white boton-menu" onclick="openNav()">
                <i class="fas fa-bars"></i>
            </span>
            <div id="mySidenav" class="sidenav d-flex flex-column bd-highlight bg-dark text-muted">
                <a href="javascript:void(0)" class="closebtn text-white" onclick="closeNav()">
                    <i class="fas fa-angle-double-left"></i>
                </a>
                <div class="card bg-dark align-middle" style="max-width: 100%; border: 0;">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ !empty(Auth::user()->jugador->avatar) ? Auth::user()->jugador->avatar : '' }}"
                                alt="..." width="100px" height="100px" class=""
                                style="padding-left: 5px; padding-top: 10px">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ Auth::user()->jugador->nombre }}</h5>
                                <p class="card-text">
                                    @if (strpos(Request::fullUrl(), 'opciones'))
                                        <a href="{{ url('/juego/jugador/opciones') }}"
                                            class="align-middle text-warning">
                                            <i class="fas fa-user-cog"></i> Opciones</a>
                                    @else
                                        <a href="{{ url('/juego/jugador/opciones') }}" class="align-middle">
                                            <i class="fas fa-user-cog"></i> Opciones</a>
                                    @endif
                                    <a href="https://discord.gg/2BB7JV48" class="">
                                        <i class="fab fa-discord"></i> Discord
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="width: 300px; color: {{ $planetaActual->color }}">
                        {{ $planetaActual->nombre }}
                        ({{ $planetaActual->estrella }}x{{ $planetaActual->orbita }})
                    </button>
                    <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton"
                        style="width: 300px">
                        @foreach ($planetasJugador as $planeta)
                            <a class="dropdown-item" style="font-size: inherit; color: {{ $planeta->color }}"
                                href="{{ url('/cambiarPlaneta/' . $planeta->id) }}">{{ $planeta->nombre }}
                                ({{ $planeta->estrella }}x{{ $planeta->orbita }})</a>
                        @endforeach
                        @if (!empty($planetasAlianza))
                            @foreach ($planetasAlianza as $planeta)
                                @if ($loop->iteration == 1)
                                    <div class="dropdown-divider"></div>
                                @endif
                                <a class="dropdown-item text-info" style="color: {{ $planeta->color }}"
                                    href="{{ url('/cambiarPlaneta/' . $planeta->id) }}">{{ $planeta->nombre }}
                                    ({{ $planeta->estrella }}x{{ $planeta->orbita }})</a>
                            @endforeach
                        @endif
                    </div>
                </div>
                <hr class="text-light">
                @if (strpos(Request::fullUrl(), '/juego/general'))
                    <a href="{{ url('/juego/general') }}" class="align-middle text-warning">
                        <i class="fas fa-bullhorn"></i> General</a>
                @else
                    <a href="{{ url('/juego/general') }}" class="align-middle">
                        <i class="fas fa-bullhorn"></i> General</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/construccion'))
                    <a href="{{ url('/juego/construccion') }}" class="align-middle text-warning">
                        <i class="fas fa-warehouse"></i> Construcción</a>
                @else
                    <a href="{{ url('/juego/construccion') }}" class="align-middle">
                        <i class="fas fa-warehouse"></i> Construcción</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/investigacion'))
                    <a href="{{ url('/juego/investigacion') }}" class="align-middle text-warning">
                        <i class="fas fa-atom"></i> Investigación</a>
                @else
                    <a href="{{ url('/juego/investigacion') }}" class="align-middle">
                        <i class="fas fa-atom"></i> Investigación</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/planeta'))
                    <a href="{{ url('/juego/planeta') }}" class="align-middle text-warning">
                        <i class="fas fa-globe-europe"></i> Planeta</a>
                @else
                    <a href="{{ url('/juego/planeta') }}" class="align-middle">
                        <i class="fas fa-globe-europe"></i> Planeta</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/fuselajes'))
                    <a href="{{ url('/juego/fuselajes') }}" class="align-middle text-warning">
                        <i class="fas fa-pencil-ruler"></i> Fuselajes</a>
                @else
                    <a href="{{ url('/juego/fuselajes') }}" class="align-middle">
                        <i class="fas fa-pencil-ruler"></i> Fuselajes</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/disenio'))
                    <a href="{{ url('/juego/disenio') }}" class="align-middle text-warning">
                        <i class="fas fa-industry"></i> Hangar</a>
                @else
                    <a href="{{ url('/juego/disenio') }}" class="align-middle">
                        <i class="fas fa-industry"></i> Hangar</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/politica'))
                    <a href="{{ url('/juego/politica') }}" class="align-middle text-warning">
                        <i class="far fa-handshake"></i> Política</a>
                @else
                    <a href="{{ url('/juego/politica') }}" class="align-middle">
                        <i class="far fa-handshake"></i> Política</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/astrometria'))
                    <a href="{{ url('/juego/astrometria') }}" class="align-middle text-warning">
                        <i class="fas fa-map-marked-alt"></i> Astrometría</a>
                @else
                    <a href="{{ url('/juego/astrometria') }}" class="align-middle">
                        <i class="fas fa-map-marked-alt"></i> Astrometría</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/flotas'))
                    <a href="{{ url('/juego/flotas') }}" class="align-middle text-warning">
                        <i class="fas fa-space-shuttle"></i> Flotas</a>
                @else
                    <a href="{{ url('/juego/flotas') }}" class="align-middle">
                        <i class="fas fa-space-shuttle"></i> Flotas</a>
                @endif
                @if (1 > 2)
                    @if (strpos(Request::fullUrl(), '/juego/banco'))
                        <a href="{{ url('/juego/banco') }}" class="align-middle text-warning">
                            <i class="fas fa-money-bill-alt"></i> Banco</a>
                    @else
                        <a href="{{ url('/juego/banco') }}" class="align-middle">
                            <i class="fas fa-money-bill-alt"></i> Banco</a>
                    @endif

                    @if (strpos(Request::fullUrl(), '/juego/comercio'))
                        <a href="{{ url('/juego/comercio') }}" class="align-middle text-warning">
                            <i class="fas fa-industry"></i> Comercio</a>
                    @else
                        <a href="{{ url('/juego/comercio') }}" class="align-middle">
                            <i class="fas fa-industry"></i> Comercio</a>
                    @endif

                    @if (strpos(Request::fullUrl(), '/juego/gruposNaves'))
                        <a href="{{ url('/juego/gruposNaves') }}" class="align-middle text-warning">
                            <i class="far fa-object-group"></i> Grupos</a>
                    @else
                        <a href="{{ url('/juego/gruposNaves') }}" class="align-middle">
                            <i class="far fa-object-group"></i> Grupos</a>
                    @endif
                @endif
                @if (strpos(Request::fullUrl(), '/juego/alianza'))
                    <a href="{{ url('/juego/alianza') }}" class="align-middle text-warning">
                        <i class="fas fa-users"></i> Alianza</a>
                @else
                    <a href="{{ url('/juego/alianza') }}" class="align-middle">
                        <i class="fas fa-users"></i> Alianza</a>
                @endif
                @if (strpos(Request::fullUrl(), '/juego/estadisticas'))
                    <a href="{{ url('/juego/estadisticas') }}" class="align-middle text-warning">
                        <i class="fas fa-chart-bar"></i> Estadísticas</a>
                @else
                    <a href="{{ url('/juego/estadisticas') }}" class="align-middle">
                        <i class="fas fa-chart-bar"></i> Estadísticas</a>
                @endif

                {{-- <hr class="text-light"> --}}
                <footer class="footer mt-auto">
                    <div class="container">
                        <ul class="list-inline">
                            <li class="list-inline-item ">
                                @if (strpos(Request::fullUrl(), '/juego/mensajes'))
                                    <a href="{{ url('/juego/mensajes') }}" class="text-warning">
                                        <i class="far fa-envelope fs-3"></i>
                                        <span
                                            class="badge rounded-pill bg-warning text-dark notification">{{ $mensajeNuevo }}</span>
                                    </a>
                                @else
                                    <a href="{{ url('/juego/mensajes') }}">
                                        <i class="far fa-envelope fs-3"></i>
                                        <span
                                            class="badge rounded-pill bg-warning text-dark notification">{{ $mensajeNuevo }}</span>
                                    </a>
                                @endif
                            </li>
                            <li class="list-inline-item">
                                <a href="">
                                    <i class="fas fa-tasks fs-3"></i>
                                    <span class="badge rounded-pill bg-success notification">0</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="{{ url('/juego/flotas') }}">
                                    <i class="fas fa-crosshairs fs-3"></i></i>
                                    <span class="badge rounded-pill bg-info text-dark notification">0</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ url('/logout') }}" target="_self"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                        <i class="fas fa-power-off fs-3"></i>
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
        <div class=" flex-column" style="height: 100vh !important; overflow-x: hidden; width: 100%;">
            <div class="row text-light text-center align-items-center pt-1" style="background-color: rgba(0, 0, 0, 0.5);">
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Personal
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Personal ocupado en el planeta">
                                ({{ number_format($personalOcupado, 0, ',', '.') }})
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="personal">
                            {{ number_format(floor($recursos->personal) - $personalOcupado, 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->personal, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Mineral
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="El almacenamiento de mineral es ilimitado">
                                Ilimitado
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="mineral">
                            {{ number_format(floor($recursos->mineral), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->mineral, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-block d-sm-none"></div>
                <div class="w-100 d-none d-sm-block d-md-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Cristal
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="El almacenamiento de cristal es ilimitado">
                                Ilimitado
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="cristal">
                            {{ number_format(floor($recursos->cristal), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->cristal, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-none d-md-block d-lg-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Gas
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[0]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="gas">
                            {{ number_format(floor($recursos->gas), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->gas, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-block d-sm-none"></div>
                <div class="w-100 d-none d-sm-block d-md-none"></div>
                <div class="w-100 d-none d-lg-block d-xl-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Plastico
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[1]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="plastico">
                            {{ number_format(floor($recursos->plastico), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->plastico, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Ceramica
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[2]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="ceramica">
                            {{ number_format(floor($recursos->ceramica), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->ceramica, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-block d-sm-none"></div>
                <div class="w-100 d-none d-sm-block d-md-none"></div>
                <div class="w-100 d-none d-md-block d-lg-none"></div>
                <div class="w-100 d-none d-xl-block d-xxl-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Liquidos
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[3]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="liquido">
                            {{ number_format(floor($recursos->liquido), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->liquido, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Micros
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[4]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="micros">
                            {{ number_format(floor($recursos->micros), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->micros, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-block d-sm-none"></div>
                <div class="w-100 d-none d-sm-block d-md-none"></div>
                <div class="w-100 d-none d-lg-block d-xl-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Fuel
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[5]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="fuel">
                            {{ number_format(floor($recursos->fuel), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->fuel, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-none d-md-block d-lg-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            M-A
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[6]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="ma">
                            {{ number_format(floor($recursos->ma), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->ma, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="w-100 d-block d-sm-none"></div>
                <div class="w-100 d-none d-sm-block d-md-none"></div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Munición
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Cantidad de este recurso que puedes almacenar en el planeta">
                                {{ number_format($capacidadAlmacenes[7]->capacidad, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="municion">
                            {{ number_format(floor($recursos->municion), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->municion, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col container-xl">
                    <div class="row">
                        <div class="col text-warning">
                            Créditos
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-danger">
                            0
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-gray" id="creditos">
                            {{ number_format(floor($recursos->creditos), 0, ',', '.') }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-info">
                            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                                title="Producción de este recurso por hora">
                                {{ number_format($produccion->creditos / 24, 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- jQuery -->
            <script src="{{ asset('js/jquery/jquery-3.5.1.min.js') }}"></script>

            <!-- Bootstrap -->
            <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

            <!-- sliders -->
            <script src="{{ asset('js/nouislider/nouislider.min.js') }}"></script>

            <!-- Select2 -->
            <script src="{{ asset('js/select2/select2.min.js') }}"></script>

            <!-- Easy Timer JS -->
            <script src="{{ asset('js/easytimer/easytimer.min.js') }}"></script>

            <!-- Personalizado -->
            <script src="{{ asset('js/custom.js') }}"></script>

            <script>
                var recursos = @json($recursos);
                recursos.personal -= @json($personalOcupado);
                //console.log(recursos);
                var produccion = @json($produccion);
                //console.log(produccion);
                var almacenes = @json($capacidadAlmacenes);
                // console.log(almacenes);
                activarIntervalo(recursos, almacenes, produccion, 250);
                // $('select').selectpicker();
            </script>

            @yield('content')
        </div>

    </div>

    <!-- Modal -->
    <div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content bg-dark text-light">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitulo"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </button>
                </div>
                <div class="modal-body" id="datosContenido">
                </div>
                {{-- <div class="modal-footer">
                </div> --}}
            </div>
        </div>
    </div>

    <!-- Personalizado -->
    <script src="{{ asset('js/popover.js') }}"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "300px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>
