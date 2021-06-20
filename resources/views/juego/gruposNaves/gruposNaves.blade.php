@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">

            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="crear-tab" data-bs-toggle="tab" href="#crear" role="tab"
                        aria-controls="crear" aria-selected="true" onclick="tabsConstruccion('crear-tab')">
                        Grupos por defecto
                    </a>
                    <a class="nav-item nav-link" id="volando-tab" data-bs-toggle="tab" href="#volando" role="tab"
                        aria-controls="volando" aria-selected="false" onclick="tabsConstruccion('volando-tab')">
                        Ver flota
                    </a>
                    <a class="nav-item nav-link" id="bandos-tab" data-bs-toggle="tab" href="#almacenes" role="tab"
                        aria-controls="almacenes" aria-selected="false" onclick="tabsConstruccion('bandos-tab')">
                        Creador de bandos
                    </a>
                    <a class="nav-item nav-link" id="asignador-tab" data-bs-toggle="tab" href="#asignador" role="tab"
                        aria-controls="asignador" aria-selected="false" onclick="tabsConstruccion('asignador-tab')">
                        Asignador de Bandos
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="crear" role="tabpanel" aria-labelledby="crear-tab">

                        @include('juego.gruposNaves.cajitaGrupos', [
                        ])

                </div>
                <div class="tab-pane fade" id="volando" role="tabpanel" aria-labelledby="volando-tab">

                </div>
                <div class="tab-pane fade " id="bandos" role="tabpanel " aria-labelledby="bandos-tab">

                </div>
                <div class="tab-pane fade" id="asignador" role="tabpanel" aria-labelledby="asignador-tab">

                </div>
        </div>
    </div>

    <div id="combate" name="combate"></div>



    <script>
        mostrarTab(@json($tab));

        let jugadorActual = @json($jugadorActual);
        let disenios=@json($disenios);

                //imgfondoparalax1="{{ asset('astrometria/img/sistema/planeta51.png')}}";
        //imgfondoparalax2="{{ asset('astrometria/img/sistema/planeta51.png')}}";
        imgNada="{{ asset('img/combate/nada.png') }}";
        imgStartexture="{{ asset('img/combate/starTexture.png') }}";
        imgfondoparalax1=imgNada;
        imgfondoparalax2=imgNada;


    </script>

<script src="{{ asset('js/pixi/pixi.min.js') }}"></script>
<script src="{{ asset('js/pixi/pixi-filters.js') }}"></script>
<script src="{{ asset('js/combate/cargasInicio.js') }}"></script>
<script src="{{ asset('js/combate/gruposNaves.js') }}"></script>
<script src="{{ asset('js/combate/combate.js') }}"></script>
<script src="{{ asset('js/combate/controles.js') }}"></script>

<script src="{{ asset('js/combate/interface.js') }}"></script>
<script>

    //////////////////////////////
    // datos de jugador

        var alianzas=new Array();
        var alianza=new Array();
        alianza.nombre="ninguna";
        alianzas[0]=alianza;

        var valoresjugador=new Array();

        valoresjugador.escudo=imgNada; //log de la alianza
        valoresjugador.DefensaInicial=0; //se calcula dinamicamente
        valoresjugador.nombre=jugadorActual.nombre;
        valoresjugador.njugador=jugadorActual.id;
        valoresjugador.ordenjugador=0;
        valoresjugador.bando=1;
        valoresjugador.alianza=0;
        valoresJugadores[jugadorActual.id]=valoresjugador;

    //////////////////////////////
    // datos de diseños naves

    var valoresDisenos=new Array();
    disenios.forEach(disenio => {
        var diseno=new Array();
        ndiseno=disenio['id'];
        diseno.nimagen=disenio['fuselajes_id'];
        diseno.skin=disenio['skin'];
        diseno.ataque=disenio['datos']['ataque'];
        diseno.defensa=disenio['datos']['defensa'];
        diseno.denominacion=disenio['codigo'];
        diseno.nombre=disenio['nombre'];

        valoresDisenos[ndiseno]=diseno;

    });


</script>

@endsection
