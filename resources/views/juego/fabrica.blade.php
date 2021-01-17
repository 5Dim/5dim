@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link active" id="cazas-tab" data-bs-toggle="tab" href="#cazas" role="tab"
                        aria-controls="cazas" aria-selected="true">
                        Cazas
                    </a>
                    <a class="nav-item nav-link" id="ligeras-tab" data-bs-toggle="tab" href="#ligeras" role="tab"
                        aria-controls="ligeras" aria-selected="false">
                        Ligeras
                    </a>
                    <a class="nav-item nav-link" id="medias-tab" data-bs-toggle="tab" href="#medias" role="tab"
                        aria-controls="medias" aria-selected="false">
                        Medias
                    </a>
                    <a class="nav-item nav-link" id="pesadas-tab" data-bs-toggle="tab" href="#pesadas" role="tab"
                        aria-controls="pesadas" aria-selected="false">
                        Pesadas
                    </a>
                    <a class="nav-item nav-link" id="estaciones-tab" data-bs-toggle="tab" href="#estaciones" role="tab"
                        aria-controls="estaciones" aria-selected="false">
                        Estaciones
                    </a>
                    <a class="nav-item nav-link" id="novas-tab" data-bs-toggle="tab" href="#novas" role="tab"
                        aria-controls="novas" aria-selected="false">
                        Novas
                    </a>
                    <a class="nav-item nav-link" id="defensas-ligeras-tab" data-bs-toggle="tab" href="#defensas-ligeras"
                        role="tab" aria-controls="defensas-ligeras" aria-selected="false">
                        Defensas ligeras
                    </a>
                    <a class="nav-item nav-link" id="defensas-medias-tab" data-bs-toggle="tab" href="#defensas-medias"
                        role="tab" aria-controls="defensas-medias" aria-selected="false">
                        Defensas medias
                    </a>
                    <a class="nav-item nav-link" id="defensas-pesadas-tab" data-bs-toggle="tab" href="#defensas-pesadas"
                        role="tab" aria-controls="defensas-pesadas" aria-selected="false">
                        Defensas pesadas
                    </a>
                    <a class="nav-item nav-link" id="defensas-estacion-tab" data-bs-toggle="tab" href="#defensas-estacion"
                        role="tab" aria-controls="defensas-estacion" aria-selected="false">
                        Estaciones de defensa
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="cazas" role="tabpanel" aria-labelledby="cazas-tab">
                </div>
                <div class="tab-pane fade" id="ligeras" role="tabpanel" aria-labelledby="ligeras-tab">
                </div>
                <div class="tab-pane fade" id="medias" role="tabpanel" aria-labelledby="medias-tab">
                </div>
                <div class="tab-pane fade" id="pesadas" role="tabpanel" aria-labelledby="pesadas-tab">
                </div>
                <div class="tab-pane fade" id="estaciones" role="tabpanel" aria-labelledby="estaciones-tab">
                </div>
                <div class="tab-pane fade" id="novas" role="tabpanel" aria-labelledby="novas-tab">
                </div>
                <div class="tab-pane fade" id="defensas-ligeras" role="tabpanel" aria-labelledby="defensas-ligeras-tab">
                </div>
                <div class="tab-pane fade" id="defensas-medias" role="tabpanel" aria-labelledby="defensas-medias-tab">
                </div>
                <div class="tab-pane fade" id="defensas-pesadas" role="tabpanel" aria-labelledby="defensas-pesadas-tab">
                </div>
                <div class="tab-pane fade" id="defensas-estacion" role="tabpanel" aria-labelledby="defensas-estacion-tab">
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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
