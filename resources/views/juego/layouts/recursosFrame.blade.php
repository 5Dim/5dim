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
        <title>Fabricas - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'astrometria'))
        <title>Astrometria - Quinta Dimension</title>
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
        <title>Estadisticas - Quinta Dimension</title>
    @elseif(strpos(Request::fullUrl(), 'tienda'))
        <title>Tienda - Quinta Dimension</title>
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
</head>

<body class="bg" id="recursosFrame">
    <div id="menuC" class="container-fluid ">
        <div id="menuCuenta" class="row d-flex overflow-auto ">
            <table class="table table-borderless table-sm text-center borderless anchofijo" style="margin: 0px;">
                <thead>
                    <tr>
                        <th class="text-warning">
                            <a href="{{ url('/juego/mensajes') }}" target="_self">
                                @if ($mensajeNuevo)
                                    <img class="" src="{{ asset('img/juego/skin0/icons/ico-barra-men2.png') }}"
                                        title="Mensajes" />
                                @else
                                    <img class="" src="{{ asset('img/juego/skin0/icons/ico-barra-men.png') }}"
                                        title="Mensajes" />
                                @endif
                            </a>
                        </th>
                        <th class="text-warning  ">
                            {{-- <a href="misiones.php?tipo=1" target="_self"> --}}
                            <img src="{{ asset('img/juego/skin0/icons/ico-barra-mis.png') }}" title="Misiones" />
                            {{-- </a> --}}
                        </th>
                        <th class="text-warning  ">
                            <a href="{{ url('/juego/estadisticas') }}" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-est.png') }}"
                                    title="Estadisticas" />
                            </a>
                        </th>
                        <th class="text-warning  ">
                            {{-- <a href="http://es.5dim.wikia.com/wiki/Wiki_5dim" target="_blank"> --}}
                            <img src="{{ asset('img/juego/skin0/icons/ico-barra-wik.png') }}" title="Wikia" />
                            {{-- </a> --}}
                        </th>
                        <th class="text-warning  ">
                            <a href="https://discord.gg/X4hRNCYyt8" target="_blank">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-sop.png') }}"
                                    title="Discord channel" />
                            </a>
                        </th>
                        <th class="text-warning " style="max-width: 120px;">
                            <a tabindex="0" type="button" class="btn btn-sm btn-dark" data-bs-toggle="popover"
                                data-bs-trigger="focus" title="Puntos de imperio"
                                data-bs-content="Estos son los puntos de imperio, consume 10 por cada planeta colonizado y se pueden conseguir {{ (int) $consImperio }} por cada nivel de administracion de imperio (investigacion)">
                                PI <span
                                    class="badge bg-warning text-dark">{{ $nivelImperio * $consImperio + 10 - count($planetasJugador) * 10 }}</span>
                            </a>
                        </th>
                        <th class="text-warning  " style="max-width: 120px;">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item bg-transparent">
                                    <h2 class="accordion-header" id="flush-headingOne">
                                        <button class="btn btn-sm btn-dark" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="false"
                                            aria-controls="flush-collapseOne">
                                            Recursos
                                        </button>
                                    </h2>
                                </div>
                            </div>
                        </th>
                        <th class="text-warning ">
                            <a tabindex="0" type="button" class="btn btn-sm btn-dark popover-dismiss"
                                data-bs-toggle="popover" data-bs-trigger="focus" title="Tienes 0 ataque(s) en curso"
                                data-bs-content="Una o varias flotas enemigas se dirigen a nuestros planetas o flotas">
                                Ataques <span class="badge bg-warning text-dark">0</span>
                            </a>
                        </th>
                        {{-- <th class="text-warning " style="max-width: 120px;">
                            <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="popover"
                                data-trigger="focus" title="Novas"
                                data-bs-content="Las novas se usan para adquirir fuselajes especiales, modo premium y algunos packs de defensa, están disponibles en la tienda">
                                Novas <span class="badge bg-warning text-dark">{{ Auth::user()->novas }}</span>
                            </button>
                        </th> --}}
                        <th class="text-warning  ">
                            {{-- <a href="cuenta.php" target="_self"> --}}
                            <img src="{{ asset('img/juego/skin0/icons/ico-barra-opc.png') }}" title="Opciones" />
                            {{-- </a> --}}
                        </th>
                        <th class="text-warning  ">
                            {{-- <a href="http://quintadim.foroactivo.com" target="_blank"> --}}
                            <img src="{{ asset('img/juego/skin0/icons/ico-barra-foro.png') }}" title="Foro" />
                            {{-- </a> --}}
                        </th>
                        <th class="text-warning  ">
                            <a href="{{ url('/juego/tienda') }}" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-shop.png') }}" title="Tienda" />
                            </a>
                        </th>
                        <th class="text-warning  ">
                            {{-- <a href="mensajeC.php?adm=1" target="_self"> --}}
                            <img src="{{ asset('img/juego/skin0/icons/ico-barra-rep.png') }}"
                                title="Reportar Admin" />
                            {{-- </a> --}}
                        </th>
                        <th class="text-warning  ">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ url('/logout') }}" target="_self"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <img src="{{ asset('img/juego/skin0/icons/ico-barra-salir2.png') }}"
                                        title="Salir" />
                            </form>
                            </a>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="menuRecursos" class=" ">
            <div id="flush-collapseOne" class="accordion-collapse collapse show overflow-auto"
                aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                <table class="table table-borderless table-sm text-center borderless">
                    <thead>
                        <tr>
                            <th class="text-warning borderless">
                                Personal
                            </th>
                            <th class="text-warning borderless">
                                Mineral
                            </th>
                            <th class="text-warning borderless">
                                Cristal
                            </th>
                            <th class="text-warning borderless">
                                Gas
                            </th>
                            <th class="text-warning borderless">
                                Plástico
                            </th>
                            <th class="text-warning borderless">
                                Cerámica
                            </th>
                            <th class="text-warning borderless">
                                Liquido
                            </th>
                            <th class="text-warning borderless">
                                Micros
                            </th>
                            <th class="text-warning borderless">
                                Fuel
                            </th>
                            <th class="text-warning borderless">
                                M-A
                            </th>
                            <th class="text-warning borderless">
                                Munición
                            </th>
                            <th class="text-warning borderless">
                                Creditos
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-danger borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Personal ocupado en el planeta">({{ number_format($personalOcupado, 0, ',', '.') }})</span>
                            </td>
                            <td class="text-danger borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="El almacenamiento de mineral es ilimitado">Ilimitado</span>
                            </td>
                            <td class="text-danger borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="El almacenamiento de cristal es ilimitado">Ilimitado</span>
                            </td>
                            @foreach ($capacidadAlmacenes as $almacen)
                                @if ($loop->index == 3)
                                @endif
                                <td class="text-danger borderless" data-bs-toggle="tooltip">
                                    @if ($almacen->capacidad != 'Almacen')
                                        <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cantidad de este recurso que puedes almacenar en el planeta">{{ number_format($almacen->capacidad, 0, ',', '.') }}</span>
                                    @else
                                        <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cantidad de este recurso que puedes almacenar en el planeta">{{ $almacen->capacidad }}</span>
                                    @endif
                                </td>
                            @endforeach
                            <td class="text-danger borderless"></td>
                        </tr>
                        <tr>
                            <td id="personal" class="text-warning borderless">
                                {{ number_format($recursos->personal - $personalOcupado, 0, ',', '.') }}
                            </td>
                            <td id="mineral" class="text-warning borderless">
                                {{ number_format($recursos->mineral, 0, ',', '.') }}
                            </td>
                            <td id="cristal" class="text-warning borderless">
                                {{ number_format($recursos->cristal, 0, ',', '.') }}
                            </td>
                            <td id="gas" class="text-warning borderless">
                                {{ number_format($recursos->gas, 0, ',', '.') }}
                            </td>
                            <td id="plastico" class="text-warning borderless">
                                {{ number_format($recursos->plastico, 0, ',', '.') }}
                            </td>
                            <td id="ceramica" class="text-warning borderless">
                                {{ number_format($recursos->ceramica, 0, ',', '.') }}
                            </td>
                            <td id="liquido" class="text-warning borderless">
                                {{ number_format($recursos->liquido, 0, ',', '.') }}
                            </td>
                            <td id="micros" class="text-warning borderless">
                                {{ number_format($recursos->micros, 0, ',', '.') }}
                            </td>
                            <td id="fuel" class="text-warning borderless">
                                {{ number_format($recursos->fuel, 0, ',', '.') }}
                            </td>
                            <td id="ma" class="text-warning borderless">
                                {{ number_format($recursos->ma, 0, ',', '.') }}
                            </td>
                            <td id="municion" class="text-warning borderless">
                                {{ number_format($recursos->municion, 0, ',', '.') }}
                            </td>
                            <td class="text-warning borderless">
                                {{ number_format($recursos->creditos, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->personal, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->mineral, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->cristal, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->gas, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->plastico, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->ceramica, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->liquido, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->micros, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->fuel, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->ma, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->municion, 0, ',', '.') }}</span>
                            </td>
                            <td class="text-primary borderless">
                                <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Producción de este recurso por hora">{{ number_format($produccion->creditos / 24, 0, ',', '.') }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="menuIconos" class="row d-flex">
                <table class="table table-borderless table-sm text-center borderless">
                    <thead>
                        <tr>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/construccion') }}" title="Construye tu imperio"
                                    target="_self">
                                    @if (strpos(Request::fullUrl(), 'construccion'))
                                        <img title="Construcción"
                                            src="{{ asset('img/juego/skin0/icons/ico-cons1.png') }}" />
                                    @else
                                        <img title="Construcción"
                                            src="{{ asset('img/juego/skin0/icons/ico-cons0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-cons1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-cons0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/investigacion') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'investigacion'))
                                        <img title="Investigación"
                                            src="{{ asset('img/juego/skin0/icons/ico-inv1.png') }}" />
                                    @else
                                        <img title="Investigación"
                                            src="{{ asset('img/juego/skin0/icons/ico-inv0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-inv1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-inv0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/planeta') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'planeta'))
                                        <img title="Planeta"
                                            src="{{ asset('img/juego/skin0/icons/ico-pla1.png') }}" />
                                    @else
                                        <img title="Planeta" src="{{ asset('img/juego/skin0/icons/ico-pla0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-pla1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-pla0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/fuselajes') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'fuselajes'))
                                        <img title="Fuselajes"
                                            src="{{ asset('img/juego/skin0/icons/ico-dis1.png') }}" />
                                    @else
                                        <img title="Fuselajes"
                                            src="{{ asset('img/juego/skin0/icons/ico-dis0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-dis1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-dis0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/disenio') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'disenio'))
                                        <img title="Diseños"
                                            src="{{ asset('img/juego/skin0/icons/ico-prod1.png') }}" />
                                    @else
                                        <img title="Diseños" src="{{ asset('img/juego/skin0/icons/ico-prod0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-prod1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-prod0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/fabricas') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'fabricas'))
                                        <img title="Politica"
                                            src="{{ asset('img/juego/skin0/icons/ico-def1.png') }}" />
                                    @else
                                        <img title="Politica" src="{{ asset('img/juego/skin0/icons/ico-def0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-def1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-def0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <div class="dropdown">
                                    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $planetaActual->nombre }}
                                        ({{ $planetaActual->estrella }}x{{ $planetaActual->orbita }})
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton">
                                        @foreach ($planetasJugador as $planeta)
                                            <a class="dropdown-item"
                                                href="{{ url('/cambiarPlaneta/' . $planeta->id) }}">{{ $planeta->nombre }}
                                                ({{ $planeta->estrella }}x{{ $planeta->orbita }})</a>
                                        @endforeach
                                        @if (!empty($planetasAlianza))
                                            @foreach ($planetasAlianza as $planeta)
                                                @if ($loop->iteration == 1)
                                                    <div class="dropdown-divider"></div>
                                                @endif
                                                <a class="dropdown-item text-info"
                                                    href="{{ url('/cambiarPlaneta/' . $planeta->id) }}">{{ $planeta->nombre }}
                                                    ({{ $planeta->estrella }}x{{ $planeta->orbita }})</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/astrometria') }}" target="_blank">
                                    @if (strpos(Request::fullUrl(), 'astrometria'))
                                        <img title="Astrometría"
                                            src="{{ asset('img/juego/skin0/icons/ico-ast1.png') }}" />
                                    @else
                                        <img title="Astrometría"
                                            src="{{ asset('img/juego/skin0/icons/ico-ast0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-ast1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-ast0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/flotas') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'flotas'))
                                        <img title="Flotas"
                                            src="{{ asset('img/juego/skin0/icons/ico-flo1.png') }}" />
                                    @else
                                        <img title="Flotas" src="{{ asset('img/juego/skin0/icons/ico-flo0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-flo1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-flo0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/banco') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'banco'))
                                        <img title="Banco"
                                            src="{{ asset('img/juego/skin0/icons/ico-ban1.png') }}" />
                                    @else
                                        <img title="Banco" src="{{ asset('img/juego/skin0/icons/ico-ban0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-ban1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-ban0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/comercio') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'comercio'))
                                        <img title="Comercio"
                                            src="{{ asset('img/juego/skin0/icons/ico-com1.png') }}" />
                                    @else
                                        <img title="Comercio"
                                            src="{{ asset('img/juego/skin0/icons/ico-com0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-com1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-com0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/general') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'general'))
                                        <img title="General"
                                            src="{{ asset('img/juego/skin0/icons/ico-gen1.png') }}" />
                                    @else
                                        <img title="General" src="{{ asset('img/juego/skin0/icons/ico-gen0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-gen1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-gen0.png') }}" />
                                    @endif
                                </a>
                            </th>
                            <th class="text-warning ">
                                <a id="constr" href="{{ url('/juego/alianza') }}" target="_self">
                                    @if (strpos(Request::fullUrl(), 'alianza'))
                                        <img title="Alianza"
                                            src="{{ asset('img/juego/skin0/icons/ico-ali1.png') }}" />
                                    @else
                                        <img title="Alianza" src="{{ asset('img/juego/skin0/icons/ico-ali0.png') }}"
                                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-ali1.png') }}"
                                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-ali0.png') }}" />
                                    @endif
                                </a>
                            </th>
                        </tr>
                    </thead>
                </table>
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
</body>

</html>
