@extends('juego.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-12 rounded cajita">
                <form method="POST" action="{{ url('juego/enviarMensaje') }}" style="margin: 10px;">
                    @csrf
                    <div class="row">
                        <div class="col-9">
                            <input id="asunto" name="asunto" type="text" class="form-control input" placeholder="Asunto">
                            <textarea class="ckeditor" name="descripcion" id="descripcion">
                                Este es el textarea que es modificado por la clase ckeditor
                            </textarea>
                        </div>
                        <div class="col-3">
                            <input id="listaJugadores" name="listaJugadores" type="text" class="form-control input" multiple>
                            <br>
                            <button class="btn btn-success btn-block align-bottom" type="submit">
                                <i class="fa fa-share-square"></i> Enviar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#listaJugadores').select2({
                theme: "bootstrap",
                width: '100%',
                closeOnSelect: false,
                allowClear: true,
                placeholder: "Nombre del jugador",
                data: [
                    { id: 1, text: "Ford"     },
                    { id: 2, text: "Dodge"    },
                    { id: 3, text: "Mercedes" },
                    { id: 4, text: "Jaguar"   }
                ],
                language: "es"
            });
        });
    </script>
@endsection