@extends('juego.layouts.recursosFrame')

@section('content')
<div class="container">
    <nav class="cajita-info rounded">
        <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
            align="center">
            <a class="nav-item nav-link active" id="general-tab" data-bs-toggle="tab" href="#general" role="tab"
                aria-controls="general" aria-selected="true">
                Vista general
            </a>
            <a class="nav-item nav-link" id="miembros-tab" data-bs-toggle="tab" href="#miembros" role="tab"
                aria-controls="miembros" aria-selected="false">
                Miembros
            </a>
            <a class="nav-item nav-link" id="solicitudes-tab" data-bs-toggle="tab" href="#solicitudes" role="tab"
                aria-controls="solicitudes" aria-selected="false">
                Solicitudes
            </a>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="general" role="tabpanel" aria-labelledby="general-tab">
            @include('juego.alianza.vistaAlianza', [
            'alianza' => $jugadorActual->alianzas,
            ])
        </div>
        <div class="tab-pane fade" id="miembros" role="tabpanel" aria-labelledby="miembros-tab">
            @include('juego.alianza.vistaMiembros', [
            'miembros' => $jugadorActual->alianzas->miembros,
            ])
        </div>
        <div class="tab-pane fade" id="solicitudes" role="tabpanel" aria-labelledby="solicitudes-tab">
            @include('juego.alianza.vistaSolicitudes', [
            'solicitudes' => $jugadorActual->alianzas->solicitudes,
            ])
        </div>
    </div>
</div>
@endsection
