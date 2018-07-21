@extends('juego.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <nav>
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link active" id="prediseñadas-tab" data-toggle="tab" href="#prediseñadas" role="tab" aria-controls="prediseñadas" aria-selected="true">
                    Prediseñadas
                </a>
                <a class="nav-item nav-link" id="cazas-tab" data-toggle="tab" href="#cazas" role="tab" aria-controls="cazas" aria-selected="false">
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
            <div class="tab-pane fade show active" id="prediseñadas" role="tabpanel" aria-labelledby="prediseñadas-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "prediseñada")
                        @include('juego.cajitaFuselajesPrediseñados', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="cazas" role="tabpanel" aria-labelledby="cazas-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "caza")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "caza")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="ligeras" role="tabpanel" aria-labelledby="ligeras-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "ligera")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "ligera")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="medias" role="tabpanel" aria-labelledby="medias-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "media")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "media")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="pesadas" role="tabpanel" aria-labelledby="pesadas-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "pesada")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "pesada")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="estaciones" role="tabpanel" aria-labelledby="estaciones-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "estacion")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "estacion")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="defensas" role="tabpanel" aria-labelledby="defensas-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "defensa")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "defensa")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="aviones" role="tabpanel" aria-labelledby="aviones-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "avion")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "avion")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="infanteria" role="tabpanel" aria-labelledby="infanteria-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "infanteria")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "infanteria")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="vehiculos" role="tabpanel" aria-labelledby="vehiculos-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "vehiculo")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "vehiculo")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="mechs" role="tabpanel" aria-labelledby="mechs-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "mech")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "mech")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="megabot" role="tabpanel" aria-labelledby="megabot-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "jugador" and $fuselajes[$i]->tamaño == "megabot")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "alianza" and $fuselajes[$i]->tamaño == "megabot")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
                @endfor
            </div>
            <div class="tab-pane fade show" id="novas" role="tabpanel" aria-labelledby="novas-tab">
                @for ($i = 0 ; $i < count($fuselajes) ; $i++)
                    @if ($fuselajes[$i]->categoria == "compra")
                        @include('juego.cajitaFuselajes', [
                            'fuselaje' => $fuselajes[$i],
                        ])
                    @endif
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
</script>
@endsection