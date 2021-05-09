@extends('juego.layouts.recursosFrame') @section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link " id="enviar-tab" data-bs-toggle="tab" href="#enviar" role="tab"
                        aria-controls="Enviar" aria-selected="true">
                        Enviar
                    </a>
                    <a class="nav-item nav-link active" id="envuelo-tab" data-bs-toggle="tab" href="#envuelo" role="tab"
                        aria-controls="envuelo" aria-selected="false" onclick="verFlotasEnVuelo()">
                        En vuelo
                    </a>
                    <a class="nav-item nav-link" id="orbita-tab" data-bs-toggle="tab" href="#orbita" role="tab"
                        aria-controls="orbita" aria-selected="false" onclick="verFlotasEnOrbita()">
                        En órbita
                    </a>
                    <a class="nav-item nav-link" id="recoleccion-tab" data-bs-toggle="tab" href="#recoleccion" role="tab"
                        aria-controls="recoleccion" aria-selected="false" onclick="verFlotasEnRecoleccion()">
                        En recolección
                    </a>

                    {{-- <a class="nav-item nav-link" id="novas-tab" data-bs-toggle="tab" href="#novas" role="tab"
                        aria-controls="novas" aria-selected="false">
                        Novas
                    </a> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade " id="enviar" role="tabpanel" aria-labelledby="enviar-tab">
                    @include('juego.flotas.enviar')
                </div>
                <div class="tab-pane fade show active" id="envuelo" role="tabpanel" aria-labelledby="envuelo-tab">
                    @include('juego.flotas.cajitaFlotas', [
                        'envuelo' => true
                        ])
                </div>
                <div class="tab-pane fade" id="orbita" role="tabpanel" aria-labelledby="orbita-tab">
                    @include('juego.flotas.cajitaEnOrbita', [
                        'envuelo' => true
                        ])
                </div>
                <div class="tab-pane fade" id="recoleccion" role="tabpanel" aria-labelledby="recoleccion-tab">
                    @include('juego.flotas.cajitaEnRecoleccion', [
                        'envuelo' => true
                        ])

                </div>


            </div>
        </div>
    </div>


    <script>
        verFlotasEnVuelo()
    </script>
@endsection
