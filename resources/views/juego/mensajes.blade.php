@extends('juego.recursosFrame')

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
                    @include ('juego.nuevoMensaje')
                </div>
                <div class="tab-pane fade show active" id="recibidos" role="tabpanel" aria-labelledby="recibidos-tab">
                    @include ('juego.cajitaMensajes')
                </div>
                <div class="tab-pane fade" id="enviados" role="tabpanel" aria-labelledby="enviados-tab">

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