@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @if (count($colaInvestigacion) > 0)
                <div class="row rounded cajita">
                    <div class="col-12">
                        <div id="cuadro1" class="table-responsive">
                            <table class="table table-borderless borderless table-sm text-center anchofijo"
                                style="margin-bottom: 15px !important;">
                                <tr>
                                    <td class=" text-warning">Edificio</td>
                                    <td class=" text-warning">Accion</td>
                                    <td class=" text-warning">Nivel</td>
                                    <td class=" text-warning">Personal</td>
                                    <td class=" text-warning">Acaba a las</td>
                                    <td class=" text-warning">Tiempo restante</td>
                                    <td>&nbsp;</td>
                                </tr>
                                @for ($i = 0; $i < count($colaInvestigacion); $i++)
                                    <tr>
                                        <td class=" text-light align-middle borderless">
                                            {{ trans('investigacion.' . $colaInvestigacion[$i]->investigaciones->codigo) }}
                                        </td>
                                        <td class="text-success text-success align-middle borderless">
                                            {{ $colaInvestigacion[$i]->accion }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ $colaInvestigacion[$i]->nivel }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ number_format($colaInvestigacion[$i]->personal, 0, ',', '.') }}
                                        </td>
                                        <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                            {{ (new DateTime($colaInvestigacion[$i]->finished_at, new DateTimeZone('UTC')))->setTimezone(new DateTimeZone("Europe/Madrid"))->format("Y-m-d H:i:s") }}
                                        </td>
                                        <td class=" text-light align-middle borderless" id="{{ $colaInvestigacion[$i]->id }}"></td>
                                        <td class=" text-light align-middle borderless">
                                            <button type="button" class="btn btn-outline-danger col-12 btn-sm"
                                                onclick="sendCancelarInvestigacion('{{ $colaInvestigacion[$i]->id }}')">
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
                    @for ($i = 0; $i < count($colaInvestigacion); $i++)
                        id[{{ $i }}] = {{ $colaInvestigacion[$i]->id }};
                        tiempos[{{ $i }}] = {{ strtotime($colaInvestigacion[$i]->finished_at) - strtotime(date('Y-m-d H:i:s')) }};
                    @endfor
                    // console.log(id);
                    // console.log(tiempos);
                    cuentaAtras(id, tiempos);
                </script>
            @endif

            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link  active" id="armamento-tab" data-bs-toggle="tab" href="#armamento"
                        role="tab" aria-controls="armamento" aria-selected="true">
                        Armamento
                    </a>
                    <a class="nav-item nav-link" id="blindajes-tab" data-bs-toggle="tab" href="#blindajes" role="tab"
                        aria-controls="blindajes" aria-selected="false">
                        Blindajes
                    </a>
                    <a class="nav-item nav-link" id="civiles-tab" data-bs-toggle="tab" href="#civiles" role="tab"
                        aria-controls="civiles" aria-selected="false">
                        Civiles
                    </a>
                    <a class="nav-item nav-link" id="imperiales-tab" data-bs-toggle="tab" href="#imperiales" role="tab"
                        aria-controls="imperiales" aria-selected="false">
                        Imperio
                    </a>
                    <a class="nav-item nav-link" id="motores-tab" data-bs-toggle="tab" href="#motores" role="tab"
                        aria-controls="motores" aria-selected="false">
                        Motores
                    </a>
                    <a class="nav-item nav-link" id="industrias-tab" data-bs-toggle="tab" href="#industrias" role="tab"
                        aria-controls="industrias" aria-selected="false">
                        Industriales
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="armamento" role="tabpanel" aria-labelledby="armamento-tab">
                    @foreach ($armamentos as $armamento)
                        @include('juego.investigaciones.cajitaInvestigacion', [
                        'investigacion'=> $armamento,
                        'personal' => $recursos->personal - $personalOcupado,
                        'dependencia' => $dependencias->where('codigo', $armamento->codigo)->first(),
                        'nivel' => $investigaciones->where('codigo', $dependencias->where('codigo', $armamento->codigo)->first()->codigoRequiere)->first()->nivel,
                        'tab' => 'armamento-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="blindajes" role="tabpanel" aria-labelledby="blindajes-tab">
                    @foreach ($blindajes as $blindaje)
                        @include('juego.investigaciones.cajitaInvestigacion', [
                        'investigacion'=> $blindaje,
                        'personal' => $recursos->personal - $personalOcupado,
                        'dependencia' => $dependencias->where('codigo', $blindaje->codigo)->first(),
                        'nivel' => $investigaciones->where('codigo', $dependencias->where('codigo', $blindaje->codigo)->first()->codigoRequiere)->first()->nivel,
                        'tab' => 'blindajes-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="civiles" role="tabpanel" aria-labelledby="civiles-tab">
                    @foreach ($civiles as $civil)
                        @include('juego.investigaciones.cajitaInvestigacion', [
                        'investigacion'=> $civil,
                        'personal' => $recursos->personal - $personalOcupado,
                        'dependencia' => $dependencias->where('codigo', $civil->codigo)->first(),
                        'nivel' => $investigaciones->where('codigo', $dependencias->where('codigo', $civil->codigo)->first()->codigoRequiere)->first()->nivel,
                        'tab' => 'civiles-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade " id="imperiales" role="tabpanel " aria-labelledby="imperiales-tab">
                    @foreach ($imperiales as $imperial)
                        @include('juego.investigaciones.cajitaInvestigacion', [
                        'investigacion'=> $imperial,
                        'personal' => $recursos->personal - $personalOcupado,
                        'dependencia' => $dependencias->where('codigo', $imperial->codigo)->first(),
                        'nivel' => $investigaciones->where('codigo', $dependencias->where('codigo', $imperial->codigo)->first()->codigoRequiere)->first()->nivel,
                        'tab' => 'imperiales-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="motores" role="tabpanel" aria-labelledby="motores-tab">
                    @foreach ($motores as $motor)
                        @include('juego.investigaciones.cajitaInvestigacion', [
                        'investigacion'=> $motor,
                        'personal' => $recursos->personal - $personalOcupado,
                        'dependencia' => $dependencias->where('codigo', $motor->codigo)->first(),
                        'nivel' => $investigaciones->where('codigo', $dependencias->where('codigo', $motor->codigo)->first()->codigoRequiere)->first()->nivel,
                        'tab' => 'motores-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="industrias" role="tabpanel" aria-labelledby="industrias-tab">
                    @foreach ($industrial as $industria)
                        @include('juego.investigaciones.cajitaInvestigacion', [
                        'investigacion'=> $industria,
                        'personal' => $recursos->personal - $personalOcupado,
                        'dependencia' => $dependencias->where('codigo', $industria->codigo)->first(),
                        'nivel' => $investigaciones->where('codigo', $dependencias->where('codigo', $industria->codigo)->first()->codigoRequiere)->first()->nivel,
                        'tab' => 'industrias-tab',
                        ])
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitulo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="datosContenido">
                    ...
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    <script>
        mostrarTab(@json($tab));

    </script>
@endsection
