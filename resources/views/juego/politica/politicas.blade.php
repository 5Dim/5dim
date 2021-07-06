@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="construcciones-tab" data-bs-toggle="tab" href="#construcciones"
                        role="tab" aria-controls="construcciones" aria-selected="true"
                        onclick="tabsPolitica('construcciones-tab')">
                        Construcciones
                    </a>
                    <a class="nav-item nav-link" id="investigaciones-tab" data-bs-toggle="tab" href="#investigaciones"
                        role="tab" aria-controls="investigaciones" aria-selected="false"
                        onclick="tabsPolitica('investigaciones-tab')">
                        Investigaciones
                    </a>
                    <a class="nav-item nav-link" id="fuselajes-tab" data-bs-toggle="tab" href="#fuselajes" role="tab"
                        aria-controls="fuselajes" aria-selected="false" onclick="tabsPolitica('fuselajes-tab')">
                        Fuselajes
                    </a>
                    <a class="nav-item nav-link" id="universo-tab" data-bs-toggle="tab" href="#universo" role="tab"
                        aria-controls="universo" aria-selected="false" onclick="tabsPolitica('universo-tab')">
                        Universo
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="construcciones" role="tabpanel" aria-labelledby="construcciones-tab">
                    @if (date('l') == 'Monday')
                        @foreach ($politicaConstruccion as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaConstruccion as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="investigaciones" role="tabpanel" aria-labelledby="investigaciones-tab">
                    @if (date('l') == 'Monday')
                        @foreach ($politicaInvestigacion as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaInvestigacion as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade " id="fuselajes" role="tabpanel " aria-labelledby="fuselajes-tab">
                    @if (date('l') == 'Monday')
                        @foreach ($politicaFuselajes as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaFuselajes as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
                <div class="tab-pane fade" id="universo" role="tabpanel" aria-labelledby="universo-tab">
                    @if (date('l') == 'Monday')
                        @foreach ($politicaUniverso as $politica)
                            @include('juego.politica.cajitaPolitica', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @else
                        @foreach ($politicaUniverso as $politica)
                            @include('juego.politica.cajitaPoliticaVotacion', [
                            'politica'=> $politica,
                            ])
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <script>
            mostrarTab(@json($tab));
        </script>
    @endsection
