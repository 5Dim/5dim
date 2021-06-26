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

    <div id="controles" name="controles" style=" width: 100%; " class="borderless " >
        <table class="table table-sm table-borderless text-center anchofijo borderless" style="background-color: rgba(0, 0, 0, 0.9);  ">
            <tbody>
                <tr>
                    <td class=" col-8" >
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12" onclick="BotonPausa()">
                            <i class="fas fa-play-circle"></i> Play
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12" onclick="zoom(-10, camera.x,camera.y);">
                            <i class="fas fa-search-minus"></i> Zoom -
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12" onclick="zoom(20, camera.x,camera.y);">
                            <i class="fas fa-search-plus"></i> Zoom +
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div id="combate" name="combate" style="height: 400px;  width: 100%; background-color: rgba(0, 0, 0, 0.9);   z-index:-1  " >


        </div>



    <script>
        mostrarTab(@json($tab));

        let jugadorActual = @json($jugadorActual);
        let disenios=@json($disenios);
        let listaGruposNaves = @json($listaGruposNaves);
        let directorioImgNaves="{{ asset('/img/fotos naves/') }}";
        let directorioImgCombate="{{ asset('/img/combate/') }}";
        let tamagrupo =@json($tamagrupo);
        let anchoDespliegue =@json($anchodespliegue);
        let altoDespliegue =@json($altodespliegue);

        PantallaGruposNaves=true;

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

<script src="{{ asset('js/combate/combate.js') }}"></script>
<script src="{{ asset('js/combate/controles.js') }}"></script>
<script src="{{ asset('js/combate/interface.js') }}"></script>

<script src="{{ asset('js/combate/gruposNaves.js') }}"></script>
<script>



</script>

@endsection
