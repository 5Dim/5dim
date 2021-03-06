@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav class="cajita-dark rounded">
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="cazas-tab" data-bs-toggle="tab" href="#cazas" role="tab"
                        aria-controls="cazas" aria-selected="false" onclick="tabsFuselajes('cazas-tab')">
                        Naves cazas
                    </a>
                    <a class="nav-item nav-link" id="ligeras-tab" data-bs-toggle="tab" href="#ligeras" role="tab"
                        aria-controls="ligeras" aria-selected="true" onclick="tabsFuselajes('ligeras-tab')">
                        Naves Ligeras
                    </a>
                    <a class="nav-item nav-link" id="medias-tab" data-bs-toggle="tab" href="#medias" role="tab"
                        aria-controls="medias" aria-selected="false" onclick="tabsFuselajes('medias-tab')">
                        Naves Medias
                    </a>
                    <a class="nav-item nav-link" id="pesadas-tab" data-bs-toggle="tab" href="#pesadas" role="tab"
                        aria-controls="pesadas" aria-selected="false" onclick="tabsFuselajes('pesadas-tab')">
                        Naves Pesadas
                    </a>
                    <a class="nav-item nav-link" id="estaciones-tab" data-bs-toggle="tab" href="#estaciones" role="tab"
                        aria-controls="estaciones" aria-selected="false" onclick="tabsFuselajes('estaciones-tab')">
                        Estaciones espaciales
                    </a>
                    {{-- <a class="nav-item nav-link" id="novas-tab" data-bs-toggle="tab" href="#novas" role="tab"
                        aria-controls="novas" aria-selected="false">
                        Naves Novas
                    </a> --}}
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="cazas" role="tabpanel" aria-labelledby="cazas-tab">
                    @foreach ($cazas as $caza)
                        @include('juego.fuselajes.cajitaFuselajes', [
                            'fuselaje' => $caza,
                            'fuselajesJugador' => $fuselajesJugador,
                            'tab' => 'cazas-tab'
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="ligeras" role="tabpanel" aria-labelledby="ligeras-tab">
                    @foreach ($ligeras as $ligera)
                        @include('juego.fuselajes.cajitaFuselajes', [
                            'fuselaje' => $ligera,
                            'fuselajesJugador' => $fuselajesJugador,
                            'tab' => 'ligeras-tab'
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="medias" role="tabpanel" aria-labelledby="medias-tab">
                    @foreach ($medias as $media)
                        @include('juego.fuselajes.cajitaFuselajes', [
                            'fuselaje' => $media,
                            'fuselajesJugador' => $fuselajesJugador,
                            'tab' => 'medias-tab'
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pesadas" role="tabpanel" aria-labelledby="pesadas-tab">
                    @foreach ($pesadas as $pesada)
                        @include('juego.fuselajes.cajitaFuselajes', [
                            'fuselaje' => $pesada,
                            'fuselajesJugador' => $fuselajesJugador,
                            'tab' => 'pesadas-tab'
                        ])
                    @endforeach
                </div>
                <div class="tab-pane fade" id="estaciones" role="tabpanel" aria-labelledby="estaciones-tab">
                    @foreach ($estaciones as $estacion)
                        @include('juego.fuselajes.cajitaFuselajes', [
                            'fuselaje' => $estacion,
                            'fuselajesJugador' => $fuselajesJugador,
                            'tab' => 'estaciones-tab'
                        ])
                    @endforeach
                </div>
                {{-- <div class="tab-pane fade" id="novas" role="tabpanel" aria-labelledby="novas-tab">
                    @foreach ($novas as $nova)
                        @include('juego.fuselajes.cajitaFuselajes', [
                            'fuselaje' => $nova,
                            'fuselajesJugador' => $fuselajesJugador,
                            'tab' => 'novas-tab'
                        ])
                    @endforeach
                </div> --}}
            </div>
        </div>
    </div>

    <script>
        mostrarTab(@json($tab));
    </script>
@endsection
