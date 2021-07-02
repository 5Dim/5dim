@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="anuncios-tab" data-bs-toggle="tab" href="#anuncios" role="tab"
                        aria-controls="anuncios" aria-selected="false" onclick="tabsGeneral('anuncios-tab')">
                        Anuncios
                    </a>
                    <a class="nav-item nav-link" id="eventos-tab" data-bs-toggle="tab" href="#eventos" role="tab"
                        aria-controls="eventos" aria-selected="true" onclick="tabsGeneral('eventos-tab')">
                        Eventos y misiones
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="anuncios" role="tabpanel" aria-labelledby="anuncios-tab">
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
