@extends('juego.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        @if (count($colaInvestigaciones) > 0)
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
                            @for ($i = 0 ; $i < count($colaInvestigaciones) ; $i++)
                                <tr>
                                    <td class=" text-light align-middle borderless">
                                        {{ trans('construccion.' . $colaInvestigaciones[$i]->construcciones->codigo) }}
                                    </td>
                                    <td class=" {{ $colaInvestigaciones[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} text-success align-middle borderless">
                                        {{ $colaInvestigaciones[$i]->accion }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaInvestigaciones[$i]->nivel }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ number_format($colaInvestigaciones[$i]->personal, 0,",",".") }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaInvestigaciones[$i]->created_at }}
                                    </td>
                                    <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                        {{ $colaInvestigaciones[$i]->finished_at }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        <button type="button" class="btn btn-outline-danger btn-block btn-sm" onclick="sendCancelar('{{ $colaInvestigaciones[$i]->id }}')">
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
                <a class="nav-item nav-link  active" id="mina-tab" data-toggle="tab" href="#mina" role="tab" aria-controls="mina" aria-selected="true">
                    Militares
                </a>
                <a class="nav-item nav-link" id="industria-tab" data-toggle="tab" href="#industria" role="tab" aria-controls="industria" aria-selected="false">
                    Misc
                </a>
                <a class="nav-item nav-link" id="almacenes-tab" data-toggle="tab" href="#almacenes" role="tab" aria-controls="almacenes" aria-selected="false">
                    Personal
                </a>
                <a class="nav-item nav-link" id="militares-tab" data-toggle="tab" href="#militares" role="tab" aria-controls="militares" aria-selected="false">
                    Motores
                </a>
                <a class="nav-item nav-link" id="desarrollo-tab" data-toggle="tab" href="#desarrollo" role="tab" aria-controls="desarrollo" aria-selected="false">
                    Mejoras de industrias
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="mina" role="tabpanel" aria-labelledby="mina-tab">
                @for ($i = 0 ; $i < 6 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="industria" role="tabpanel" aria-labelledby="industria-tab">
                @for ($i = 6 ; $i < 11 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade " id="almacenes" role="tabpanel " aria-labelledby="almacenes-tab">
                @if($tipoPlaneta == 'planeta')
                    @php
                        $i = 15;
                    @endphp
                @endif
                @for ($i = 13 ; $i < 21 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="militares" role="tabpanel" aria-labelledby="militares-tab">
                @for ($i = 21 ; $i < 26 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">
                @for ($i = 26 ; $i < 29 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
                @for ($i = 29 ; $i < 31 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
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
        @for ($i = 0 ; $i < 31 ; $i++)
            calculaTiempo(
                {{ $construcciones[$i]->coste->mineral +
                $construcciones[$i]->coste->cristal +
                $construcciones[$i]->coste->gas +
                $construcciones[$i]->coste->plastico +
                $construcciones[$i]->coste->ceramica +
                $construcciones[$i]->coste->liquido +
                $construcciones[$i]->coste->micros +
                12 }},
                {{$velocidadConst->valor}},
                '{{$construcciones[$i]->codigo}}'
            )
        @endfor

        $("#{{$tab}}").tab('show');
    });

</script>
@endsection