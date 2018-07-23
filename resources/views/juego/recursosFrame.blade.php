<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quinta Dimension</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Icons Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">

    <!-- Bootstrap -->
    <link href="{{ asset('css/bootstrap/bootstrap.min.css') }}" media="all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/custom.css') }}" media="all" rel="stylesheet" type="text/css" />

</head>

<body class="bg" id="recursosFrame">
    <div id="menuC" class="container-fluid borderless">
        <div id="menuCuenta" class="row d-flex justify-content-center borderless">
            <table class="table table-sm table-borderless text-center anchofijo" style="margin: 5px; width: 80%">
                <thead>
                    <tr>
                        <th class="text-warning borderless ">
                            <a href="mensajes.php" target="_self">
                                <img class="" src="{{ asset('img/juego/skin0/icons/ico-barra-men.png') }}" title="Mensajes"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="misiones.php?tipo=1" target="_self">
                                <img  src="{{ asset('img/juego/skin0/icons/ico-barra-mis.png') }}" title="Misiones"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="estadisticas.php" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-est.png') }}"  title="Estadisticas"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="http://es.5dim.wikia.com/wiki/Wiki_5dim" target="_blank">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-wik.png') }}"  title="Wikia"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="http://quintadim.foroactivo.com/f21-ayudas-y-preguntas" target="_blank">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-sop.png') }}"  title="Soporte"/>
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-trigger="focus" title="Tienes 1 ataque(s) en curso" data-content="Una o varias flotas enemigas se dirigen a nuestros planetas o flotas">
                                Ataques <span class="badge badge-danger">1</span>
                            </button>
                        </th>
                        <th class="text-warning borderless">
                            <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-trigger="focus" title="Puntos de imperio" data-content="Estos son los puntos de imperio, consume 100 por cada planeta colonizado">
                                PI <span class="badge badge-warning">150</span>
                            </button>
                        </th>
                        <th class="text-warning borderless">
                            <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-trigger="focus" title="Novas" data-content="Estos son los puntos de imperio, consume 100 por cada planeta colonizado">
                                Novas <span class="badge badge-warning">1.500</span>
                            </button>
                        </th>
                        <th class="text-warning borderless ">
                            <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-trigger="focus" title="Puntos de ensamblaje de naves" data-content="Estos son los puntos de imperio, consume 100 por cada planeta colonizado">
                                PEN <span class="badge badge-warning">150</span>
                            </button>
                        </th>
                        <th class="text-warning borderless ">
                            <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-trigger="focus" title="Puntos de ensamblaje de tropas" data-content="Estos son los puntos de imperio, consume 100 por cada planeta colonizado">
                                PET <span class="badge badge-warning">150</span>
                            </button>
                        </th>
                        <th class="text-warning borderless ">
                            <button type="button" class="btn btn-sm btn-dark" data-toggle="popover" data-trigger="focus" title="Puntos de ensamblaje de defensas" data-content="Estos son los puntos de imperio, consume 100 por cada planeta colonizado">
                                PED <span class="badge badge-warning">150</span>
                            </button>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="cuenta.php" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-opc.png') }}"  title="Opciones"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="http://quintadim.foroactivo.com" target="_blank">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-foro.png') }}"  title="Foro"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="compra1.php" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-shop.png') }}"  title="Tienda"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="mensajeC.php?adm=1" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-rep.png') }}"  title="Reportar Admin"/>
                            </a>
                        </th>
                        <th class="text-warning borderless ">
                            <a href="{{ url('/logout') }}" target="_self">
                                <img src="{{ asset('img/juego/skin0/icons/ico-barra-salir2.png') }}"  title="Salir"/>
                            </a>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <div id="menuRecursos" class="borderless">
            <table class="table table-hover table-borderless table-sm text-center anchofijo borderless">
                <thead>
                    <tr>
                        <th class="text-warning borderless ">
                            Personal
                        </th>
                        <th class="text-warning borderless ">
                            Mineral
                        </th>
                        <th class="text-warning borderless ">
                            Cristal
                        </th>
                        <th class="text-warning borderless ">
                            Gas
                        </th>
                        <th class="text-warning borderless ">
                            Plástico
                        </th>
                        <th class="text-warning borderless ">
                            Cerámica
                        </th>
                        <th class="text-warning borderless ">
                            Recargar
                        </th>
                        <th class="text-warning borderless ">
                            Liquido
                        </th>
                        <th class="text-warning borderless ">
                            Micros
                        </th>
                        <th class="text-warning borderless ">
                            Fuel
                        </th>
                        <th class="text-warning borderless ">
                            M-A
                        </th>
                        <th class="text-warning borderless ">
                            Munición
                        </th>
                        <th class="text-warning borderless ">
                            Moneda
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-danger borderless">
                            {{ number_format($personal, 0,",",".") }}
                        </td>
                        @foreach ($almacenes as $almacen)
                            @if ($tipoPlaneta == 'planeta' and $loop->index < 2)
                                <td class="text-danger borderless">
                                    Ilimitado
                                </td>
                            @else @if ($loop->index == 5)
                                <td class="text-danger borderless">
                                    Almacenes
                                </td>
                            @endif
                            <td class="text-danger borderless">
                                @if ($almacen->capacidad != 'Almacen') {{ number_format($almacen->capacidad, 0,",",".") }} @else {{ $almacen->capacidad }}
                                @endif
                            </td>
                        @endif @endforeach
                        <td class="text-danger borderless">
                            3200 ud/d
                        </td>
                    </tr>
                    <tr>
                        <td id="personal" class="text-warning borderless">
                            {{ number_format($recursos->personal-$personal, 0,",",".") }}
                        </td>
                        <td id="mineral" class="text-warning borderless">
                            {{ number_format($recursos->mineral, 0,",",".") }}
                        </td>
                        <td id="cristal" class="text-warning borderless">
                            {{ number_format($recursos->cristal, 0,",",".") }}
                        </td>
                        <td id="gas" class="text-warning borderless">
                            {{ number_format($recursos->gas, 0,",",".") }}
                        </td>
                        <td id="plastico" class="text-warning borderless">
                            {{ number_format($recursos->plastico, 0,",",".") }}
                        </td>
                        <td id="ceramica" class="text-warning borderless">
                            {{ number_format($recursos->ceramica, 0,",",".") }}
                        </td>
                        <td class="text-warning borderless">
                            Producido
                        </td>
                        <td id="liquido" class="text-warning borderless">
                            {{ number_format($recursos->liquido, 0,",",".") }}
                        </td>
                        <td id="micros" class="text-warning borderless">
                            {{ number_format($recursos->micros, 0,",",".") }}
                        </td>
                        <td id="fuel" class="text-warning borderless">
                            {{ number_format($recursos->fuel, 0,",",".") }}
                        </td>
                        <td id="ma" class="text-warning borderless">
                            {{ number_format($recursos->ma, 0,",",".") }}
                        </td>
                        <td id="municion" class="text-warning borderless">
                            {{ number_format($recursos->municion, 0,",",".") }}
                        </td>
                        <td class="text-warning borderless">
                            15
                        </td>
                    </tr>
                    <tr>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[0]->personal, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[1]->mineral, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[2]->cristal, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[3]->gas, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[4]->plastico, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[5]->ceramica, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            Producción
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[6]->liquido, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[7]->micros, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[8]->fuel, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[9]->ma, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            <span>{{ number_format($producciones[10]->municion, 0,",",".") }}</span> ud/h
                        </td>
                        <td class="text-primary borderless">
                            3200 ud/d
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="menuIconos" class="row d-flex justify-content-center borderless">
            <table class="table table-hover table-borderless table-sm centradoDiv70 text-center">
                <thead>
                    <tr>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/construccion')}}" title="Construye tu imperio" target="_self">
                                <img title="Construcción"
                                src="{{ asset('img/juego/skin0/icons/ico-cons0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-cons1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-cons0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/investigacion')}}" target="_self">
                                <img title="Investigación"
                                src="{{ asset('img/juego/skin0/icons/ico-inv0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-inv1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-inv0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/planeta')}}" target="_self">
                                <img title="Planeta"
                                src="{{ asset('img/juego/skin0/icons/ico-pla0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-pla1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-pla0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/fuselajes')}}" target="_self">
                                <img title="fuselajes"
                                src="{{ asset('img/juego/skin0/icons/ico-def0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-def1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-def0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/diseño')}}" target="_self">
                                <img title="Diseños"
                                src="{{ asset('img/juego/skin0/icons/ico-dis0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-dis1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-dis0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/fabricas')}}" target="_self">
                                <img title="Producción"
                                src="{{ asset('img/juego/skin0/icons/ico-prod0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-prod1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-prod0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <div class="dropdown">
                                <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="badge badge-danger">1</span> {{ $planetaActual->estrella }}x{{ $planetaActual->orbita }} {{ $planetaActual->nombre }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @php
                                        $planetas = Auth::user()->jugadores[0]->planetas;
                                    @endphp
                                    @foreach ($planetas as $planeta)
                                        <a class="dropdown-item" href="{{ url('/planeta/' . $planeta->id) }}"><span class="badge badge-danger">1</span> {{ $planeta->estrella }}x{{ $planeta->orbita }} {{ $planeta->nombre }}</a>
                                    @endforeach
                                </div>
                            </div>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/astrometria')}}" target="_self">
                                <img title="Astrometría"
                                src="{{ asset('img/juego/skin0/icons/ico-ast0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-ast1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-ast0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/flotas')}}" target="_self">
                            <img title="Flotas"
                            src="{{ asset('img/juego/skin0/icons/ico-flo0.png') }}"
                            onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-flo1.png') }}"
                            onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-flo0.png') }}" />
                        </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/banco')}}" target="_self">
                            <img title="Banco"
                                src="{{ asset('img/juego/skin0/icons/ico-ban0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-ban1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-ban0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/comercio')}}" target="_self">
                                <img title="Comercio"
                                src="{{ asset('img/juego/skin0/icons/ico-com0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-com1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-com0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/general')}}" target="_self">
                                <img title="General"
                                src="{{ asset('img/juego/skin0/icons/ico-gen0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-gen1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-gen0.png') }}" />
                            </a>
                        </th>
                        <th class="text-warning borderless">
                            <a id="constr" href="{{url('/juego/alianza')}}" target="_self">
                                <img title="Alianza"
                                src="{{ asset('img/juego/skin0/icons/ico-ali0.png') }}"
                                onmouseover=this.src="{{ asset('img/juego/skin0/icons/ico-ali1.png') }}"
                                onmouseout=this.src="{{ asset('img/juego/skin0/icons/ico-ali0.png') }}" />
                            </a>
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('js/jquery/jquery-3.3.1.min.js') }}"></script>

    <!-- Bootstrap -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- Personalizado -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        $( document ).ready(function() {
        var recursos = {!! json_encode($recursos) !!};
        recursos.personal -= {{$personal}}
        //console.log(recursos);
        var produccion = {!! json_encode($producciones) !!};
        //console.log(produccion);
        var almacenes = {!! json_encode($almacenes) !!};
        //console.log(almacenes);
        activarIntervalo(recursos, almacenes, produccion, 250);
    });
    </script>
    <script>
        $(function () {
            $('[data-toggle="popover"]').popover()
        })
    </script>
    @yield('content')
</body>

</html>