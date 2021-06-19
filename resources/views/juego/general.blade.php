@extends('juego.layouts.recursosFrame')
@section('content')
    <div class="container-fluid">
        <div class="container-fluid">

            @include('juego.gruposNaves.cajitaGrupos', [
                ])


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

    <div id="combate" name="combate"></div>

<script src="{{ asset('js/pixi/pixi.min.js') }}"></script>
<script src="{{ asset('js/pixi/pixi-filters.js') }}"></script>
<script src="{{ asset('js/combate/cargasInicio.js') }}"></script>
<script src="{{ asset('js/combate/gruposNaves.js') }}"></script>
<script src="{{ asset('js/combate/combate.js') }}"></script>
<script src="{{ asset('js/combate/controles.js') }}"></script>

<script src="{{ asset('js/combate/interface.js') }}"></script>



    <script>
    </script>
@endsection
