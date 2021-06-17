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
                                    <td colspan="7" class=" text-success">Cola construcciones</td>
                                </tr>
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
            @if (count($colaInvestigacion) > 0)
                <div class="row rounded cajita">
                    <div class="col-12">
                        <div id="cuadro1" class="table-responsive">
                            <table class="table table-borderless borderless table-sm text-center anchofijo"
                                style="margin-bottom: 15px !important;">
                                <tr>
                                    <td colspan="7" class=" text-success">Cola investigaciones</td>
                                </tr>
                                <tr>
                                    <td class=" text-warning">Edificio</td>
                                    <td class=" text-warning">Accion</td>
                                    <td class=" text-warning">Nivel</td>
                                    <td class=" text-warning">Personal</td>
                                    <td class=" text-warning">Empeza a las</td>
                                    <td class=" text-warning">Acaba a las</td>
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
                                        <td class=" text-light align-middle borderless">
                                            {{ $colaInvestigacion[$i]->created_at }}
                                        </td>
                                        <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                            {{ $colaInvestigacion[$i]->finished_at }}
                                        </td>
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
            @endif
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTitulo"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
    </script>
@endsection
