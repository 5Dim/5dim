<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo">
                <tr>
                    <td colspan="1" class="text-{{ $clase }} text-center borderless align-middle">
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href="" role="button"
                            aria-expanded="false" data-bs-target=".mensajeEnviado{{ $mensaje->id }}"
                            aria-controls="mensajeEnviado{{ $mensaje->id }}1 mensajeEnviado{{ $mensaje->id }}2 mensajeEnviado{{ $mensaje->id }}3">
                            <img class="rounded" src="{{ $mensaje->jugadores->avatar }}" width="50" height="50">
                            <big>{{ $mensaje->jugadores->nombre }}<big>
                        </a>
                    </td>
                    <td colspan="7" class="text-{{ $clase }} text-center borderless align-middle">
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href="" role="button"
                            aria-expanded="false" data-bs-target=".mensajeEnviado{{ $mensaje->id }}"
                            aria-controls="mensajeEnviado{{ $mensaje->id }}1 mensajeEnviado{{ $mensaje->id }}2 mensajeEnviado{{ $mensaje->id }}3">
                            <big>Asunto: {{ $mensaje->asunto }}<big>
                        </a>
                    </td>
                    <td colspan="2" class="text-{{ $clase }} text-center borderless align-middle">
                        Enviado a:
                        @foreach ($mensaje->intervinientes as $intervinientes)
                            @if($loop->last)
                                <span class="text-light">{{ $intervinientes->jugadores->nombre }}.</span>
                            @else
                                <span class="text-light">{{ $intervinientes->jugadores->nombre }},</span>
                            @endif
                        @endforeach
                    </td>
                    <td colspan="1" class="text-{{ $clase }} text-center borderless align-middle">
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href=""
                            role="button" aria-expanded="false" data-bs-target=".mensajeEnviado{{ $mensaje->id }}"
                            aria-controls="mensajeEnviado{{ $mensaje->id }}1 mensajeEnviado{{ $mensaje->id }}2 mensajeEnviado{{ $mensaje->id }}3">
                            <big>{{ $mensaje->created_at }}<big>
                        </a>
                    </td>
                </tr>
                <tr>
                </tr>
                <tr>
                    <td id="mensajeEnviado{{ $mensaje->id }}2" rowspan="4" colspan="11"
                        class="anchofijo text-light borderless collapse mensajeEnviado{{ $mensaje->id }} text-left">
                        {!! $mensaje->mensaje !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table id="mensajeEnviado{{ $mensaje->id }}3"
                class="table table-sm table-borderless text-center anchofijo collapse mensajeEnviado{{ $mensaje->id }}">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-danger col-12 btn-sm " data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Eliminar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12 btn-sm " data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Reportar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12 btn-sm " data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Responder
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
