@extends('juego.layouts.recursosFrame') @section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @if (count($colaDisenios) > 0)
                <div class="row rounded cajita">
                    <div class="col-12">
                        <div id="cuadro1" class="table-responsive">
                            <table class="table table-borderless borderless table-sm text-center anchofijo"
                                style="margin-bottom: 15px !important">
                                <tr>
                                    <td class="text-warning">Disenio</td>
                                    <td class="text-warning">Accion</td>
                                    <td class="text-warning">Cantidad</td>
                                    <td class="text-warning">Acaba a las</td>
                                    <td class="text-warning">Tiempo restante</td>
                                    <td>&nbsp;</td>
                                </tr>
                                @for ($i = 0; $i < count($colaDisenios); $i++)
                                    <tr>
                                        <td class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->nombre }}
                                        </td>
                                        <td
                                            class=" {{ $colaDisenios[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} text-success align-middle borderless">
                                            {{ $colaDisenios[$i]->accion }}
                                        </td>
                                        <td class="text-light align-middle borderless">
                                            {{ $colaDisenios[$i]->cantidad }}
                                        </td>
                                        <td id="fechaFin{{ $i }}" class="text-light align-middle borderless">
                                            {{ (new DateTime($colaDisenios[$i]->finished_at, new DateTimeZone('UTC')))->setTimezone(new DateTimeZone(Auth::user()->timezone))->format('Y-m-d H:i:s') }}
                                        </td>
                                        <td class="text-light align-middle borderless" id="{{ $colaDisenios[$i]->id }}">
                                        </td>
                                        <td class="text-light align-middle borderless">
                                            <button type="button" class="btn btn-outline-danger col-12 btn-sm"
                                                onclick="sendCancelarDisenio('{{ $colaDisenios[$i]->id }}')">
                                                <i class="fa fa-trash"></i> Cancelar
                                            </button>
                                        </td>
                                    </tr>
                                @endfor
                            </table>
                        </div>
                    </div>
                </div>
                <script>
                    var id = [];
                    var tiempos = [];
                    @for ($i = 0; $i < count($colaDisenios); $i++)
                        id[{{ $i }}] = {{ $colaDisenios[$i]->id }};
                        tiempos[{{ $i }}] = {{ strtotime($colaDisenios[$i]->finished_at) - strtotime(date('Y-m-d H:i:s')) }};
                    @endfor
                    cuentaAtras(id, tiempos);

                </script>
            @endif
            <nav class="cajita-info rounded">
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="cazas-tab" data-bs-toggle="tab" href="#cazas" role="tab"
                        aria-controls="cazas" aria-selected="true" onclick="tabsDisenio('cazas-tab')">
                        Naves cazas
                    </a>
                    <a class="nav-item nav-link" id="ligeras-tab" data-bs-toggle="tab" href="#ligeras" role="tab"
                        aria-controls="ligeras" aria-selected="false" onclick="tabsDisenio('ligeras-tab')">
                        Naves Ligeras
                    </a>
                    <a class="nav-item nav-link" id="medias-tab" data-bs-toggle="tab" href="#medias" role="tab"
                        aria-controls="medias" aria-selected="false" onclick="tabsDisenio('medias-tab')">
                        Naves Medias
                    </a>
                    <a class="nav-item nav-link" id="pesadas-tab" data-bs-toggle="tab" href="#pesadas" role="tab"
                        aria-controls="pesadas" aria-selected="false" onclick="tabsDisenio('pesadas-tab')">
                        Naves Pesadas
                    </a>
                    <a class="nav-item nav-link" id="estaciones-tab" data-bs-toggle="tab" href="#estaciones" role="tab"
                        aria-controls="estaciones" aria-selected="false" onclick="tabsDisenio('estaciones-tab')">
                        Estaciones espaciales
                    </a>
                    {{-- <a class="nav-item nav-link" id="novas-tab" data-bs-toggle="tab" href="#novas" role="tab"
                        aria-controls="novas" aria-selected="false">
                        Novas
                    </a> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="cazas" role="tabpanel" aria-labelledby="cazas-tab">
                    @foreach ($cazas as $caza)
                        @include('juego.disenio.cajitaDisenios', [
                        'disenio' => $caza,
                        'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="ligeras" role="tabpanel" aria-labelledby="ligeras-tab">
                    @foreach ($ligeras as $ligera)
                        @include('juego.disenio.cajitaDisenios', [
                        'disenio' => $ligera,
                        'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="medias" role="tabpanel" aria-labelledby="medias-tab">
                    @foreach ($medias as $media)
                        @include('juego.disenio.cajitaDisenios', [
                        'disenio' => $media,
                        'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pesadas" role="tabpanel" aria-labelledby="pesadas-tab">
                    @foreach ($pesadas as $pesada)
                        @include('juego.disenio.cajitaDisenios', [
                        'disenio' => $pesada,
                        'tab' => $tab,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="estaciones" role="tabpanel" aria-labelledby="estaciones-tab">
                    @foreach ($estaciones as $estacion)
                        @include('juego.disenio.cajitaDisenios', [
                        'disenio' => $estacion,
                        'tab' => $tab,
                        ])
                    @endforeach
                </div>
                {{-- <div class="tab-pane fade" id="novas" role="tabpanel" aria-labelledby="novas-tab">
                    @foreach ($novas as $nova)
                        @include('juego.disenio.cajitaDisenios', [
                            'disenio' => $nova,
                            'tab' => $tab,
                        ])
                    @endforeach
                </div> --}}
            </div>
        </div>
    </div>
    <div class="modal fade" id="datosModal" tabindex="-1" aria-labelledby="datosModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header modal-header-dark cajita-success" style="margin: 0px">
                    <h5 class="modal-title text-success" id="ModalTitulo">
                        Nave de carga
                    </h5>
                    <button type="button" class="btn-close btn-light" style="background-color: white"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-body-dark cajita" id="datosContenido" style="margin: 0px">
                    <table class="table table-borderless borderless table-sm text-center anchofijo">
                        <tr>
                            <td class="text-warning">Carga</td>
                            <td class="text-warning">Recoleccion</td>
                            <td class="text-warning">Extracción</td>
                            <td class="text-warning">Hangar cazas</td>
                            <td class="text-warning">Hangar ligeras</td>
                            <td class="text-warning">Hangar medias</td>
                            <td class="text-warning">Hangar pesadas</td>
                        </tr>
                        <tr>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                        </tr>
                        <tr>
                            <td class="text-warning">Mantenimiento</td>
                            <td class="text-warning">Munición</td>
                            <td class="text-warning">Fuel</td>
                            <td class="text-warning">Vel. Impulso</td>
                            <td class="text-warning">Hypervelocidad</td>
                            <td class="text-warning">Ataque</td>
                            <td class="text-warning">Defensa</td>
                        </tr>
                        <tr>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                            <td class="text-light">0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        var disenios = @json($disenios);
        var investigaciones = @json($investigaciones);
        var constantes = @json($constantes);
        var mejoras = @json($mejoras);
        var PConstantes = @json($PConstantes);
        var constanteVelocidad = @json($constanteVelocidad);
        var nivelHangar = @json($nivelHangar);
        var ViewDaniosDisenios = @json($ViewDaniosDisenios);
        //calcularDisenios(disenios, mejoras, investigaciones, constantes);
        mostrarTab(@json($tab));

    </script>
@endsection
