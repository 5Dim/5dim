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
                                    <td class=" text-warning">Empeza a las</td>
                                    <td class=" text-warning">Acaba a las</td>
                                    <td>&nbsp;</td>
                                </tr>
                                @for ($i = 0; $i < count($colaConstruccion); $i++)
                                    <tr>
                                        <td class=" text-light align-middle borderless">
                                            {{ trans('construccion.' . $colaConstruccion[$i]->construcciones->codigo) }}
                                        </td>
                                        <td
                                            class=" {{ $colaConstruccion[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} text-success align-middle borderless">
                                            {{ $colaConstruccion[$i]->accion }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ $colaConstruccion[$i]->nivel }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ number_format($colaConstruccion[$i]->personal, 0, ',', '.') }}
                                        </td>
                                        <td class=" text-light align-middle borderless">
                                            {{ $colaConstruccion[$i]->created_at }}
                                        </td>
                                        <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                            {{ $colaConstruccion[$i]->finished_at }}
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
            @endif

            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link  active" id="mina-tab" data-bs-toggle="tab" href="#mina" role="tab"
                        aria-controls="mina"
                        aria-selected="true">
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
                    <a class="nav-item nav-link" id="especialidades-tab" data-bs-toggle="tab" href="#especialidades"
                        role="tab"
                        aria-controls="especialidades" aria-selected="false">
                        Especialidades
                    </a>
                    <a class="nav-item nav-link" id="especiales-tab" data-bs-toggle="tab" href="#especiales" role="tab"
                        aria-controls="especiales" aria-selected="false">
                        Especiales
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="mina" role="tabpanel" aria-labelledby="mina-tab">
                    @foreach ($minas as $mina)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $mina,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'mina-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="industria" role="tabpanel" aria-labelledby="industria-tab">
                    @foreach ($industrias as $industria)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $industria,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'industria-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade " id="almacenes" role="tabpanel " aria-labelledby="almacenes-tab">
                    @foreach ($almacenes as $almacen)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $almacen,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'almacenes-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="militares" role="tabpanel" aria-labelledby="militares-tab">
                    @foreach ($militares as $militar)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $militar,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'militares-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">
                    @foreach ($desarrollos as $desarrollo)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $desarrollo,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'desarrollo-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
                    @foreach ($observaciones as $observacion)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $observacion,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'observacion-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="especialidades" role="tabpanel" aria-labelledby="especialidades-tab">
                    @foreach ($especializaciones as $especializacion)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $especializacion,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'observacion-tab',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="especiales" role="tabpanel" aria-labelledby="especiales-tab">
                    @foreach ($especiales as $especial)
                        @include('juego.construcciones.cajitaConstruccion', [
                        'construccion'=> $especial,
                        'personal' => $recursos->personal - $personalOcupado,
                        'tab' => 'observacion-tab',
                        ])
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="datosModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalTitulo"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="datosContenido">

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
