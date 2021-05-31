@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @if (count($colaConstruccion) > 0)
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
                                @for ($i = 0; $i < count($colaConstruccion); $i++)
                                    <tr>
                                        <td class=" text-light align-middle borderless">
                                            {{ trans('construccion.' . $colaConstruccion[$i]->construcciones->codigo) }}
                                        </td>
                                        <td
                                            class=" {{ $colaConstruccion[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} align-middle borderless">
                                            {{ $colaConstruccion[$i]->accion }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ $colaConstruccion[$i]->nivel }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ number_format($colaConstruccion[$i]->personal, 0, ',', '.') }}
                                        </td>
                                        <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                            {{ (new DateTime($colaConstruccion[$i]->finished_at, new DateTimeZone('UTC')))->setTimezone(new DateTimeZone(Auth::user()->timezone))->format("Y-m-d H:i:s") }}
                                        </td>
                                        <td class=" text-light align-middle borderless" id="{{ $colaConstruccion[$i]->id }}">
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            <button type="button" class="btn btn-outline-danger col-12 btn-sm"
                                                onclick="sendCancelar('{{ $colaConstruccion[$i]->id }}')">
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
                    @for ($i = 0; $i < count($colaConstruccion); $i++)
                        id[{{ $i }}] = {{ $colaConstruccion[$i]->id }};
                        tiempos[{{ $i }}] = {{ strtotime($colaConstruccion[$i]->finished_at) - strtotime(date('Y-m-d H:i:s')) }};
                    @endfor
                    cuentaAtras(id, tiempos);
                </script>
            @endif

            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link  active" id="mina-tab" data-bs-toggle="tab" href="#mina" role="tab"
                        aria-controls="mina" aria-selected="true">
                        Minas
                    </a>
                    <a class="nav-item nav-link" id="industria-tab" data-bs-toggle="tab" href="#industria" role="tab"
                        aria-controls="industria" aria-selected="false">
                        Industrias
                    </a>
                    <a class="nav-item nav-link" id="almacenes-tab" data-bs-toggle="tab" href="#almacenes" role="tab"
                        aria-controls="almacenes" aria-selected="false">
                        Almacenes
                    </a>
                    <a class="nav-item nav-link" id="militares-tab" data-bs-toggle="tab" href="#militares" role="tab"
                        aria-controls="militares" aria-selected="false">
                        Militares
                    </a>
                    <a class="nav-item nav-link" id="desarrollo-tab" data-bs-toggle="tab" href="#desarrollo" role="tab"
                        aria-controls="desarrollo" aria-selected="false">
                        Desarrollo
                    </a>
                    <a class="nav-item nav-link" id="observacion-tab" data-bs-toggle="tab" href="#observacion" role="tab"
                        aria-controls="observacion" aria-selected="false">
                        Observacion
                    </a>
                    {{-- <a class="nav-item nav-link" id="especialidad-tab" data-bs-toggle="tab" href="#especialidad"
                        role="tab"
                        aria-controls="especialidad" aria-selected="false">
                        Especialidades
                    </a>
                    <a class="nav-item nav-link" id="especial-tab" data-bs-toggle="tab" href="#especial" role="tab"
                        aria-controls="especial" aria-selected="false">
                        Especiales
                    </a> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="mina" role="tabpanel" aria-labelledby="mina-tab">
                    @foreach ($minas as $mina)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $mina,
                        'dependencia' => $dependencias->where('codigo', $mina->codigo)->first(),
                        'nivel' => $construcciones->where('codigo', $dependencias->where('codigo',
                        $mina->codigo)->first()->codigoRequiere)->first()->nivel,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'mina-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="industria" role="tabpanel" aria-labelledby="industria-tab">
                    @foreach ($industrias as $industria)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $industria,
                        'dependencia' => $dependencias->where('codigo', $industria->codigo)->first(),
                        'nivel' => $construcciones->where('codigo', $dependencias->where('codigo',
                        $industria->codigo)->first()->codigoRequiere)->first()->nivel,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'industria-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade " id="almacenes" role="tabpanel " aria-labelledby="almacenes-tab">
                    @foreach ($almacenes as $almacen)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $almacen,
                        'dependencia' => $dependencias->where('codigo', $almacen->codigo)->first(),
                        'nivel' => $construcciones->where('codigo', $dependencias->where('codigo',
                        $almacen->codigo)->first()->codigoRequiere)->first()->nivel,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'almacenes-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="militares" role="tabpanel" aria-labelledby="militares-tab">
                    @foreach ($militares as $militar)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $militar,
                        'dependencia' => $dependencias->where('codigo', $militar->codigo)->first(),
                        'nivel' => $construcciones->where('codigo', $dependencias->where('codigo',
                        $militar->codigo)->first()->codigoRequiere)->first()->nivel,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'militares-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">
                    @foreach ($desarrollos as $desarrollo)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $desarrollo,
                        'dependencia' => $dependencias->where('codigo', $desarrollo->codigo)->first(),
                        'nivel' => $construcciones->where('codigo', $dependencias->where('codigo',
                        $desarrollo->codigo)->first()->codigoRequiere)->first()->nivel,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'desarrollo-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
                    @foreach ($observaciones as $observacion)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $observacion,
                        'dependencia' => $dependencias->where('codigo', $observacion->codigo)->first(),
                        'nivel' => $construcciones->where('codigo', $dependencias->where('codigo',
                        $observacion->codigo)->first()->codigoRequiere)->first()->nivel,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'observacion-tab',
                        ])
                    @endforeach
                </div>
                {{-- <div class="tab-pane fade" id="especialidad" role="tabpanel" aria-labelledby="especialidad-tab">
                    @foreach ($especializaciones as $especializacion)
                        @include('juego.construcciones.cajitaConstruccion', [
                            'construccion'=> $especializacion,
                            'dependencia' => $dependencias->where('codigo', $especializacion->codigo)->first(),
                            'nivel' => $construcciones->where('codigo', $dependencias->where('codigo', $especializacion->codigo)->first()->codigoRequiere)->first()->nivel,
                            'personal' => $recursos->personal - $personalOcupado,
                            'tab' => 'especializacion-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="especial" role="tabpanel" aria-labelledby="especial-tab">
                    @foreach ($especiales as $especial)
                        @include('juego.construcciones.cajitaConstruccion', [
                            'construccion'=> $especial,
                            'dependencia' => $dependencias->where('codigo', $especial->codigo)->first(),
                            'nivel' => $construcciones->where('codigo', $dependencias->where('codigo', $especial->codigo)->first()->codigoRequiere)->first()->nivel,
                            'personal' => $recursos->personal - $personalOcupado,
                            'tab' => 'especial-tab',
                        ])
                    @endforeach
                </div> --}}
            </div>
        </div>

        <script>
            mostrarTab(@json($tab));

        </script>
    @endsection
