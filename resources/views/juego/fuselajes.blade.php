@extends('juego.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <nav>
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Prediseñadas
                </a>
                <a class="nav-item nav-link  active" id="mina-tab" data-toggle="tab" href="#mina" role="tab" aria-controls="mina" aria-selected="true">
                    Cazas
                </a>
                <a class="nav-item nav-link" id="industria-tab" data-toggle="tab" href="#industria" role="tab" aria-controls="industria" aria-selected="false">
                    Ligeras
                </a>
                <a class="nav-item nav-link" id="almacenes-tab" data-toggle="tab" href="#almacenes" role="tab" aria-controls="almacenes" aria-selected="false">
                    Medias
                </a>
                <a class="nav-item nav-link" id="militares-tab" data-toggle="tab" href="#militares" role="tab" aria-controls="militares" aria-selected="false">
                    Pesadas
                </a>
                <a class="nav-item nav-link" id="desarrollo-tab" data-toggle="tab" href="#desarrollo" role="tab" aria-controls="desarrollo" aria-selected="false">
                    Estaciones
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Defensas
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Aviones
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Infanteria
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Vehiculos
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Mechs
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Experimental
                </a>
                <a class="nav-item nav-link" id="observacion-tab" data-toggle="tab" href="#observacion" role="tab" aria-controls="observacion" aria-selected="false">
                    Novas
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="mina" role="tabpanel" aria-labelledby="mina-tab">
                @include('juego.cajitaFuselajes')
                {{--
                @for ($i = 0 ; $i < 6 ; $i++)
                    @include('juego.cajitaConstruccion', [
                        'construccion' => $construcciones[$i],
                        'personal' => $recursos->personal - $personal,
                        'tab' => 'mina-tab',
                    ])
                @endfor
                --}}
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