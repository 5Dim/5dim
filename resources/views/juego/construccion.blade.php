@extends('juego.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        @if (count($colaConstruccion) > 0)
            <div class="row rounded cajita">
                <div class="col-12">
                    <div id="cuadro1" class="table-responsive">
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
                            @for ($i = 0 ; $i < count($colaConstruccion) ; $i++)
                                <tr>
                                    <td class=" text-light align-middle borderless">
                                        {{ trans('construccion.' . $colaConstruccion[$i]->construcciones->codigo) }}
                                    </td>
                                    <td class=" {{ $colaConstruccion[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} text-success align-middle borderless">
                                        {{ $colaConstruccion[$i]->accion }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaConstruccion[$i]->nivel }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ number_format($colaConstruccion[$i]->personal, 0,",",".") }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaConstruccion[$i]->created_at }}
                                    </td>
                                    <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                        {{ $colaConstruccion[$i]->finished_at }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        <button type="button" class="btn btn-outline-danger btn-block btn-sm" onclick="sendCancelar('{{ $colaConstruccion[$i]->id }}')">
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
                    Minas
                </a>
                <a class="nav-item nav-link" id="industria-tab" data-toggle="tab" href="#industria" role="tab" aria-controls="industria" aria-selected="false">
                    Industrias
                </a>
                <a class="nav-item nav-link" id="almacenes-tab" data-toggle="tab" href="#almacenes" role="tab" aria-controls="almacenes" aria-selected="false">
                    Almacenes
                </a>
                <a class="nav-item nav-link" id="militares-tab" data-toggle="tab" href="#militares" role="tab" aria-controls="militares" aria-selected="false">
                    Militares
                </a>
                <a class="nav-item nav-link" id="desarrollo-tab" data-toggle="tab" href="#desarrollo" role="tab" aria-controls="desarrollo" aria-selected="false">
                    Desarrollo
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Observacion
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="mina" role="tabpanel" aria-labelledby="mina-tab">
                @for ($i = 0 ; $i < 6 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                        'tab' => 'mina-tab',
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="industria" role="tabpanel" aria-labelledby="industria-tab">
                @for ($i = 6 ; $i < 11 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                        'tab' => 'industria-tab',
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
                        'tab' => 'almacenes-tab',
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="militares" role="tabpanel" aria-labelledby="militares-tab">
                @for ($i = 21 ; $i < 26 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                        'tab' => 'militares-tab',
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="desarrollo" role="tabpanel" aria-labelledby="desarrollo-tab">
                @for ($i = 26 ; $i < 29 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                        'tab' => 'desarrollo-tab',
                    ])
                @endfor
            </div>
            <div class="tab-pane fade" id="observacion" role="tabpanel" aria-labelledby="observacion-tab">
                @for ($i = 29 ; $i < 32 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                        'tab' => 'observacion-tab',
                    ])
            @endfor
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
        @for ($i = 0 ; $i < 32 ; $i++)
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