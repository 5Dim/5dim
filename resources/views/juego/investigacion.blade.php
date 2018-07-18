@extends('juego.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        @if (count($colaInvestigacion) > 0)
            <div class="row rounded cajita">
                <div class="col-12">
                    <div id="cuadro1" class="table-responsive-sm">
                        <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-bottom: 15px !important;">
                            <tr>
                                <td class=" text-warning">Edificio</td>
                                <td class=" text-warning">Accion</td>
                                <td class=" text-warning">Nivel</td>
                                <td class=" text-warning">Personal</td>
                                <td class=" text-warning">Empeza a las</td>
                                <td class=" text-warning">Acaba a las</td>
                                <td>&nbsp;</td>
                            </tr>
                            @for ($i = 0 ; $i < count($colaInvestigacion) ; $i++)
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
                                        {{ number_format($colaInvestigacion[$i]->personal, 0,",",".") }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaInvestigacion[$i]->created_at }}
                                    </td>
                                    <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                        {{ $colaInvestigacion[$i]->finished_at }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        <button type="button" class="btn btn-outline-danger btn-block btn-sm" onclick="sendCancelarInvestigacion('{{ $colaInvestigacion[$i]->id }}')">
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
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link  active" id="militares-tab" data-toggle="tab" href="#militares" role="tab" aria-controls="militares" aria-selected="true">
                    Militares
                </a>
                <a class="nav-item nav-link" id="misc-tab" data-toggle="tab" href="#misc" role="tab" aria-controls="misc" aria-selected="false">
                    Varios
                </a>
                <a class="nav-item nav-link" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="personales" aria-selected="false">
                    Imperio
                </a>
                <a class="nav-item nav-link" id="motores-tab" data-toggle="tab" href="#motores" role="tab" aria-controls="motores" aria-selected="false">
                    Motores
                </a>
                <a class="nav-item nav-link" id="industrias-tab" data-toggle="tab" href="#industrias" role="tab" aria-controls="industrias" aria-selected="false">
                    Mejoras de industrias
                </a>
            </div>
        </nav>

        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="militares" role="tabpanel" aria-labelledby="militares-tab">
                @for ($i = 0 ; $i < 4 ; $i++)
                    @include('juego.cajitaInvestigacion', [
                        'investigacion' => $investigaciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="misc" role="tabpanel" aria-labelledby="misc-tab">
                @for ($i = 4 ; $i < 7 ; $i++)
                    @include('juego.cajitaInvestigacion', [
                        'investigacion' => $investigaciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade " id="personales" role="tabpanel " aria-labelledby="personales-tab">
                @for ($i = 7 ; $i < 12 ; $i++)
                    @include('juego.cajitaInvestigacion', [
                        'investigacion' => $investigaciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="motores" role="tabpanel" aria-labelledby="motores-tab">
                @for ($i = 12 ; $i < 17 ; $i++)
                    @include('juego.cajitaInvestigacion', [
                        'investigacion' => $investigaciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="industrias" role="tabpanel" aria-labelledby="industrias-tab">
                @for ($i = 17 ; $i < 22 ; $i++)
                    @include('juego.cajitaInvestigacion', [
                        'investigacion' => $investigaciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    $( document ).ready(function() {
    @for ($i = 0 ; $i < 22 ; $i++)
        calculaTiempoInvestigacion(
            {{ $investigaciones[$i]->coste->mineral +
            $investigaciones[$i]->coste->cristal +
            $investigaciones[$i]->coste->gas +
            $investigaciones[$i]->coste->plastico +
            $investigaciones[$i]->coste->ceramica +
            $investigaciones[$i]->coste->liquido +
            $investigaciones[$i]->coste->micros +
            $investigaciones[$i]->coste->fuel +
            $investigaciones[$i]->coste->municion +
            $investigaciones[$i]->coste->ma
        }},
            {{$velInvest->valor}},
            '{{$investigaciones[$i]->codigo}}',
            '{{$investigaciones[$i]->nivel}}',
            '{{$nivelLaboratorio->nivel}}'
        );
    @endfor
    });

    $("#{{$tab}}").tab('show');

</script>
@endsection