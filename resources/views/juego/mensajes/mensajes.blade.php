@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav class="cajita-info rounded">
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="nuevo-tab" data-bs-toggle="tab" href="#nuevo" role="tab"
                        aria-controls="nuevo" aria-selected="false" onclick="tabsMensajes('nuevo-tab')">
                        Nuevo mensaje
                    </a>
                    <a class="nav-item nav-link" id="recibidos-tab" data-bs-toggle="tab" href="#recibidos" role="tab"
                        aria-controls="recibidos" aria-selected="true" onclick="tabsMensajes('recibidos-tab')">
                        Recibidos
                    </a>
                    <a class="nav-item nav-link" id="enviados-tab" data-bs-toggle="tab" href="#enviados" role="tab"
                        aria-controls="enviados" aria-selected="false" onclick="tabsMensajes('enviados-tab')">
                        Enviados
                    </a>
                    <a class="nav-item nav-link" id="flotas-tab" data-bs-toggle="tab" href="#flotas" role="tab"
                        aria-controls="flotas" aria-selected="false" onclick="tabsMensajes('flotas-tab')">
                        Flotas
                    </a>
                    <a class="nav-item nav-link" id="combates-tab" data-bs-toggle="tab" href="#combates" role="tab"
                        aria-controls="combates" aria-selected="false" onclick="tabsMensajes('combates-tab')">
                        Reportes de combate
                    </a>
                    <a class="nav-item nav-link" id="espionajes-tab" data-bs-toggle="tab" href="#espionajes" role="tab"
                        aria-controls="espionajes" aria-selected="false" onclick="tabsMensajes('espionajes-tab')">
                        Reportes de espionaje
                    </a>
                    <a class="nav-item nav-link" id="eventos-tab" data-bs-toggle="tab" href="#eventos" role="tab"
                        aria-controls="eventos" aria-selected="false" onclick="tabsMensajes('eventos-tab')">
                        Reporte de sucesos
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
                    @include ('juego.mensajes.cajitaNuevoMensaje')
                </div>
                <div class="tab-pane fade" id="recibidos" role="tabpanel" aria-labelledby="recibidos-tab">
                    @foreach ($recibidos as $recibido)
                        @include('juego.mensajes.cajitaMensajesRecibidos', [
                        'mensaje' => $recibido,
                        'imagenAvatar' => 'img/juego/skin0/mensajes/comandante.jpg',
                        'tab' => 'recibidos-tab',
                        'clase' => 'warning',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="enviados" role="tabpanel" aria-labelledby="enviados-tab">
                    @foreach ($enviados as $mensaje)
                        @include('juego.mensajes.cajitaMensajesEnviados', [
                        'mensaje' => $mensaje,
                        'clase' => 'success',
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="flotas" role="tabpanel" aria-labelledby="flotas-tab">
                    @foreach ($flotas as $flota)
                        @include('juego.mensajes.cajitaMensajesRecibidos', [
                        'mensaje' => $flota,
                        'imagenAvatar' => 'img/juego/skin0/mensajes/comandante.jpg',
                        'tab' => 'flotas-tab',
                        'clase' => 'info',
                        ])
                    @endforeach
                    <span>
                        {{ $flotas->links() }}
                    </span>
                </div>
                <div class="tab-pane fade" id="combates" role="tabpanel" aria-labelledby="combates-tab">

                </div>
                <div class="tab-pane fade" id="espionajes" role="tabpanel" aria-labelledby="espionajes-tab">

                </div>
                <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">

                </div>
            </div>
        </div>
    </div>

    <script>
        mostrarTab(@json($tab));
    </script>
@endsection
