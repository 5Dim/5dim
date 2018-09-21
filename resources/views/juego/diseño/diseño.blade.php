@extends('juego.layouts.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        @if (count($colaDiseños) > 0)
            <div class="row rounded cajita">
                <div class="col-12">
                    <div id="cuadro1" class="table-responsive">
                        <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-bottom: 15px !important;">
                            <tr>
                                <td class=" text-warning">Diseño</td>
                                <td class=" text-warning">Accion</td>
                                <td class=" text-warning">Cantidad</td>
                                <td class=" text-warning">Tiempo</td>
                                <td class=" text-warning">Empeza a las</td>
                                <td class=" text-warning">Acaba a las</td>
                                <td>&nbsp;</td>
                            </tr>

                            @for ($i = 0 ; $i < count($colaDiseños) ; $i++)
                                <tr>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaDiseños[$i]->nombre }}
                                    </td>
                                    <td class=" {{ $colaDiseños[$i]->accion == 'Construyendo' ? 'text-success' : 'text-danger' }} text-success align-middle borderless">
                                        {{ $colaDiseños[$i]->accion }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaDiseños[$i]->cantidad }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaDiseños[$i]->tiempo }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        {{ $colaDiseños[$i]->created_at }}
                                    </td>
                                    <td id="fechaFin{{ $i }}" class=" text-light align-middle borderless">
                                        {{ $colaDiseños[$i]->finished_at }}
                                    </td>
                                    <td class=" text-light align-middle borderless">
                                        <button type="button" class="btn btn-outline-danger btn-block btn-sm" onclick="sendCancelarDiseño('{{ $colaDiseños[$i]->id }}')">
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
                <a class="nav-item nav-link" id="prediseñadas-tab" data-toggle="tab" href="#prediseñadas" role="tab" aria-controls="prediseñadas" aria-selected="false">
                    Prediseñadas
                </a>
                <a class="nav-item nav-link active" id="cazas-tab" data-toggle="tab" href="#cazas" role="tab" aria-controls="cazas" aria-selected="true">
                    Cazas
                </a>
                <a class="nav-item nav-link" id="ligeras-tab" data-toggle="tab" href="#ligeras" role="tab" aria-controls="ligeras" aria-selected="false">
                    Ligeras
                </a>
                <a class="nav-item nav-link" id="medias-tab" data-toggle="tab" href="#medias" role="tab" aria-controls="medias" aria-selected="false">
                    Medias
                </a>
                <a class="nav-item nav-link" id="pesadas-tab" data-toggle="tab" href="#pesadas" role="tab" aria-controls="pesadas" aria-selected="false">
                    Pesadas
                </a>
                <a class="nav-item nav-link" id="estaciones-tab" data-toggle="tab" href="#estaciones" role="tab" aria-controls="estaciones" aria-selected="false">
                    Estaciones
                </a>
                <a class="nav-item nav-link" id="defensas-tab" data-toggle="tab" href="#defensas" role="tab" aria-controls="defensas" aria-selected="false">
                    Defensas
                </a>
                <a class="nav-item nav-link" id="aviones-tab" data-toggle="tab" href="#aviones" role="tab" aria-controls="aviones" aria-selected="false">
                    Aviones
                </a>
                <a class="nav-item nav-link" id="infanteria-tab" data-toggle="tab" href="#infanteria" role="tab" aria-controls="infanteria" aria-selected="false">
                    Infanteria
                </a>
                <a class="nav-item nav-link" id="vehiculos-tab" data-toggle="tab" href="#vehiculos" role="tab" aria-controls="vehiculos" aria-selected="false">
                    Vehiculos
                </a>
                <a class="nav-item nav-link" id="mechs-tab" data-toggle="tab" href="#mechs" role="tab" aria-controls="mechs" aria-selected="false">
                    Mechs
                </a>
                <a class="nav-item nav-link" id="megabot-tab" data-toggle="tab" href="#megabot" role="tab" aria-controls="megabot" aria-selected="false">
                    MegaBot
                </a>
                <a class="nav-item nav-link" id="novas-tab" data-toggle="tab" href="#novas" role="tab" aria-controls="novas" aria-selected="false">
                    Novas
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="cazas" role="tabpanel" aria-labelledby="cazas-tab">
                @foreach ($diseños as $diseño)
                    {{-- @if ($diseño) --}}
                        @include('juego.diseño.cajitaDiseños', [
                            'diseño' => $diseño,
                        ])
                    {{-- @endif --}}
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
</script>
@endsection