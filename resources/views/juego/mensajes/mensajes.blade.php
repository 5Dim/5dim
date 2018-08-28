@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                    <a class="nav-item nav-link" id="nuevo-tab" data-toggle="tab" href="#nuevo" role="tab" aria-controls="nuevo" aria-selected="false">
                        Nuevo mensaje
                    </a>
                    <a class="nav-item nav-link active" id="recibidos-tab" data-toggle="tab" href="#recibidos" role="tab" aria-controls="recibidos" aria-selected="true">
                        Recibidos
                    </a>
                    <a class="nav-item nav-link" id="enviados-tab" data-toggle="tab" href="#enviados" role="tab" aria-controls="enviados" aria-selected="false">
                        Enviados
                    </a>
                    <a class="nav-item nav-link" id="flotas-tab" data-toggle="tab" href="#flotas" role="tab" aria-controls="flotas" aria-selected="false">
                        Flotas
                    </a>
                    <a class="nav-item nav-link" id="combates-tab" data-toggle="tab" href="#combates" role="tab" aria-controls="combates" aria-selected="false">
                        Reportes de combate
                    </a>
                    <a class="nav-item nav-link" id="conquistas-tab" data-toggle="tab" href="#conquistas" role="tab" aria-controls="conquistas" aria-selected="false">
                        Reportes de conquista
                    </a>
                    <a class="nav-item nav-link" id="espionajes-tab" data-toggle="tab" href="#espionajes" role="tab" aria-controls="espionajes" aria-selected="false">
                        Reportes de espionaje
                    </a>
                    <a class="nav-item nav-link" id="eventos-tab" data-toggle="tab" href="#eventos" role="tab" aria-controls="eventos" aria-selected="false">
                        Reporte de sucesos
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="nuevo" role="tabpanel" aria-labelledby="nuevo-tab">
                    @include ('juego.mensajes.cajitaNuevoMensaje')
                </div>
                <div class="tab-pane fade show active" id="recibidos" role="tabpanel" aria-labelledby="recibidos-tab">
                    @foreach ($recibidos as $intervinientes)
                        @if ($intervinientes->mensajes->categoria == "recibidos")
                            @php
                                if ($intervinientes->receptor == session()->get('jugadores_id')) {
                                    $clase = 'success';
                                }else{
                                    $clase = 'info';
                                }
                            @endphp
                            @include('juego.mensajes.cajitaMensajesRecibidos', [
                                'mensaje' => $intervinientes->mensajes,
                                'clase' =>$clase,
                            ])
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="enviados" role="tabpanel" aria-labelledby="enviados-tab">
                    @foreach ($enviados as $mensaje)
                        @php
                            if ($mensaje->emisor == session()->get('jugadores_id')) {
                                $clase = 'success';
                            }else{
                                $clase = 'info';
                            }
                        @endphp
                        @include('juego.mensajes.cajitaMensajesEnviados', [
                            'mensaje' => $mensaje,
                                'clase' =>$clase,
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="flotas" role="tabpanel" aria-labelledby="flotas-tab">

                </div>
                <div class="tab-pane fade" id="combates" role="tabpanel" aria-labelledby="combates-tab">

                </div>
                <div class="tab-pane fade" id="conquistas" role="tabpanel" aria-labelledby="conquistas-tab">

                </div>
                <div class="tab-pane fade" id="espionajes" role="tabpanel" aria-labelledby="espionajes-tab">

                </div>
                <div class="tab-pane fade" id="eventos" role="tabpanel" aria-labelledby="eventos-tab">

                </div>
            </div>
        </div>
    </div>
@endsection