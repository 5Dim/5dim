<div class="col-12 rounded cajita">
    <form method="POST" action="{{ url('juego/enviarMensaje') }}" style="margin: 10px;">
        @csrf
        <div class="row">
            <div class="col-9">
                <input id="asunto" name="asunto" type="text" class="form-control input" placeholder="Asunto"
                    maxlength="150">
                <textarea class="ckeditor" name="descripcion" id="descripcion" maxlength="1500"></textarea>
            </div>
            <div class="col-3">
                <button class="btn btn-success col-12 align-bottom" type="submit">
                    <i class="fa fa-share-square"></i> Enviar
                </button>
                <select id="listaJugadores" name="listaJugadores" type="text" class="form-control"></select>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $('#listaJugadores').select2({
            // theme: "bootstrap",
            width: '100%',
            // closeOnSelect: false,
            placeholder: "Nombre del jugador",
            data: [
                { id: 0, text: "Nombre del jugador" },
                @foreach ($jugadores as $jugador)
                    { id: {{ $jugador->id }}, text: "{{ $jugador->nombre }}" },
                @endforeach
            ],
            language: "es"
        });
    });
    CKEDITOR.editorConfig = function( config ) {
        config.language = 'es';
        config.uiColor = '#000000';
        config.height = 300;
        config.toolbarCanCollapse = true;
    };
</script>
