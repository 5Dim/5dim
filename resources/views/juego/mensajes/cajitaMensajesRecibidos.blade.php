<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm anchofijo">
                <tr>
                    <td colspan="1" class="text-success borderless align-middle">
                        <a class="btn btn-link text-success" data-bs-toggle="collapse" href="#" role="button"
                            aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <img class="rounded"
                                src="{{ !empty($mensaje->jugadores) ? $mensaje->jugadores->avatar : asset($imagenAvatar) }}"
                                width="50" height="50">
                        </a>
                        <a class="btn btn-link text-success" data-bs-toggle="collapse" href="#" role="button"
                            aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <big>{{ !empty($mensaje->jugadores) != null ? $mensaje->jugadores->nombre : $mensaje->emisor_sys }}<big>
                        </a>
                    </td>
                    <td colspan="7" class="text-success borderless align-middle">
                        <a class="btn btn-link text-success" data-bs-toggle="collapse" href="#" role="button"
                            aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <big>Asunto: {!! $mensaje->asunto !!}<big>
                        </a>
                    </td>
                    <td colspan="1" class="text-success borderless align-middle">
                        <a class="btn btn-link text-success" data-bs-toggle="collapse" href="#" role="button"
                            aria-expanded="false" data-bs-target=".mensajeRecibido{{ $mensaje->id }}"
                            aria-controls="mensajeRecibido{{ $mensaje->id }}">
                            <big>
                                {{ (new DateTime($mensaje->created_at, new DateTimeZone('UTC')))->setTimezone(new DateTimeZone(Auth::user()->timezone))->format("Y-m-d H:i:s") }}
                            <big>
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
                class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        <a type="button" class="btn btn-outline-danger col-12" href="mensajes/borrar/{{ $mensaje->id }}/{{ Auth::user()->jugador->id }}">
                            <i class="fa fa-info-circle"></i> Eliminar
                        </a>
                    </td>
                    <td>
                        <a type="button" class="btn btn-outline-primary col-12" href="">
                            <i class="fa fa-info-circle"></i> Reportar
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12" onclick="responderMensaje({{ $mensaje->emisor }})">
                            <i class="fa fa-info-circle"></i> Responder
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
