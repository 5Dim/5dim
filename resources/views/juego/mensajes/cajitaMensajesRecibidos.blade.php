<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm anchofijo">
                <tr>
                    <td colspan="1" class="text-{{ $clase }} borderless align-middle">
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href="#"
                            role="button" aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <img class="rounded" src="{{ $mensaje->jugadores->avatar }}" width="50" height="50">
                        </a>
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href="#"
                            role="button" aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <big> {{ $mensaje->jugadores->nombre }}<big>
                        </a>
                    </td>
                    <td colspan="7" class="text-{{ $clase }} borderless align-middle">
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href="#"
                            role="button" aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <big>Asunto: {{ $mensaje->asunto }}<big>
                        </a>
                    </td>
                    <td colspan="1" class="text-{{ $clase }} borderless align-middle">
                        <a class="btn btn-link text-{{ $clase }}" data-bs-toggle="collapse" href="#"
                            role="button" aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <big>{{ $mensaje->created_at }}<big>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td id="mensajeRecibido{{ $mensaje->id }}2" rowspan="4" colspan="9"
                        class="anchofijo text-light borderless collapse mensajeRecibido{{ $mensaje->id }} text-left">
                        {!! $mensaje->mensaje !!}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table id="mensajeRecibido{{ $mensaje->id }}3"
                class="table table-sm table-borderless text-center anchofijo collapse mensajeRecibido{{ $mensaje->id }}">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-danger col-12" data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Eliminar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12" data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Reportar
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12" data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Responder
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
