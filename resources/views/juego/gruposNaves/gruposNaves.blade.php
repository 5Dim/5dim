@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">

            <nav class="cajita-info rounded">
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
                    <div id="gruposNavesHay"> </div>

                </div>
                <div class="tab-pane fade" id="volando" role="tabpanel" aria-labelledby="volando-tab">

                </div>
                <div class="tab-pane fade " id="bandos" role="tabpanel " aria-labelledby="bandos-tab">

                </div>
                <div class="tab-pane fade" id="asignador" role="tabpanel" aria-labelledby="asignador-tab">

                </div>
        </div>
    </div>
</div>
    <div id="controles" name="controles" style=" width: 100%; " class="borderless " >
        <table class="table table-sm table-borderless text-center anchofijo borderless" style="background-color: rgba(0, 0, 0, 0.9);  ">
            <tbody>
                <tr>
                    <td class=" col-6" >
                    </td>

                    <td>
                        <button type="button" class="btn btn-outline-primary col-12" onclick="BotonPausa()">
                            <i class="fas fa-play-circle"></i> Play
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12" onclick="zoom(-10, camera.x,camera.y);">
                            <i class="fas fa-search-minus"></i> Zoom -
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12" onclick="zoom(20, camera.x,camera.y);">
                            <i class="fas fa-search-plus"></i> Zoom +
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12" id="guardarGrupos" onclick="guardarGrupos()">
                            <i class="fas fa-arrow-alt-circle-up"></i> Guardar Todo
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
        let constantesC =@json($constantesC);


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
<script src="{{ asset('js/handlebars.min-v4.7.7.js') }}"></script>

<script src="{{ asset('js/combate/cargasInicio.js') }}"></script>
<script src="{{ asset('js/combate/combate.js') }}"></script>
<script src="{{ asset('js/combate/controles.js') }}"></script>
<script src="{{ asset('js/combate/interface.js') }}"></script>

<script src="{{ asset('js/combate/gruposNaves.js') }}"></script>
<script>

window.Handlebars.registerHelper('select', function( value, options ){
        var $el = $('<select />').html( options.fn(this) );
        $el.find('[value="' + value + '"]').attr({'selected':'selected'});
        return $el.html();
    });


/// to do:
// cada vez que se cree un grupo o se quite deberia hacerse en listaGruposNaves por si no se manda bien gnave por ajax, si no pues todo con gnave
// que carge el gruposnaves.js un listaGruposNaves actualizado
// cada vez que se cambia un selector que se guarde en su listaGruposNaves
// cada vez que se crea o borra un grupo que se llame a cargarGruposNavesExistentes()



(function(){ //de inicio cargo grupos existentes
    cargarGruposNavesExistentes();
    })()

    function cargarGruposNavesExistentes(){
            $('#gruposNavesHay').load('{{ asset("templates/gruposNaves.js") }}', function(){

            var template = Handlebars.compile( $('#cajitaGruposExisten').text() );

            var data = {
                listaGruposNaves:listaGruposNaves
            };

            $('#gruposNavesHay').append( template(data) );
        });
    }

</script>

@endsection
