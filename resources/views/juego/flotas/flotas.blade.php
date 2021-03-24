@extends('juego.layouts.recursosFrame') @section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link active" id="enviar-tab" data-bs-toggle="tab" href="#enviar" role="tab"
                        aria-controls="Enviar" aria-selected="true">
                        Enviar
                    </a>
                    <a class="nav-item nav-link" id="propias-tab" data-bs-toggle="tab" href="#propias" role="tab"
                        aria-controls="propias" aria-selected="false" onclick="verFlotasEnVuelo()">
                        En vuelo
                    </a>
                    <a class="nav-item nav-link" id="orbita-tab" data-bs-toggle="tab" href="#orbita" role="tab"
                        aria-controls="orbita" aria-selected="false">
                        En órbita
                    </a>
                    <a class="nav-item nav-link" id="recoleccion-tab" data-bs-toggle="tab" href="#recoleccion" role="tab"
                        aria-controls="recoleccion" aria-selected="false">
                        En recolección
                    </a>

                    {{-- <a class="nav-item nav-link" id="novas-tab" data-bs-toggle="tab" href="#novas" role="tab"
                        aria-controls="novas" aria-selected="false">
                        Novas
                    </a> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="enviar" role="tabpanel" aria-labelledby="enviar-tab">
                    @include('juego.flotas.enviar')
                </div>
                <div class="tab-pane fade" id="propias" role="tabpanel" aria-labelledby="propias-tab">
                    @include('juego.flotas.cajitaFlotas', [
                        'envuelo' => true
                        ])
                </div>
                <div class="tab-pane fade" id="orbita" role="tabpanel" aria-labelledby="orbita-tab">

                </div>
                <div class="tab-pane fade" id="recoleccion" role="tabpanel" aria-labelledby="recoleccion-tab">

                </div>


            </div>
        </div>
    </div>


    <script>



    </script>
@endsection
