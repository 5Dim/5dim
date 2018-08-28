<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless borderless table-sm text-center anchofijo" >
                    <tr>
                        <td colspan="1" class="text-{{ $clase }} text-center borderless align-middle">
                            <a class="btn btn-link text-{{ $clase }}" data-toggle="collapse" href="" role="button" aria-expanded="false" data-target=".mensajeEnviado{{ $mensaje->id }}" aria-controls="mensajeEnviado{{ $mensaje->id }}1 mensajeEnviado{{ $mensaje->id }}2 mensajeEnviado{{ $mensaje->id }}3">
                                <big>{{ $mensaje->jugadores->nombre }}<big>
                            </a>
                        </td>
                        <td colspan="8" class="text-{{ $clase }} text-center borderless align-middle">
                            <a class="btn btn-link text-{{ $clase }}" data-toggle="collapse" href="" role="button" aria-expanded="false" data-target=".mensajeEnviado{{ $mensaje->id }}" aria-controls="mensajeEnviado{{ $mensaje->id }}1 mensajeEnviado{{ $mensaje->id }}2 mensajeEnviado{{ $mensaje->id }}3">
                                <big>Asunto: {{ $mensaje->asunto }}<big>
                            </a>
                        </td>
                        <td colspan="1" class="text-{{ $clase }} text-center borderless align-middle">
                            <a class="btn btn-link text-{{ $clase }}" data-toggle="collapse" href="" role="button" aria-expanded="false" data-target=".mensajeEnviado{{ $mensaje->id }}" aria-controls="mensajeEnviado{{ $mensaje->id }}1 mensajeEnviado{{ $mensaje->id }}2 mensajeEnviado{{ $mensaje->id }}3">
                                <big>{{ $mensaje->created_at }}<big>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td id="mensajeEnviado{{ $mensaje->id }}1" rowspan="5" class="anchofijo text-warning borderless collapse mensajeEnviado{{ $mensaje->id }}">
                            <img class="rounded" src="{{ $mensaje->jugadores->avatar }}" width="180" height="119">
                        </td>
                        <td id="mensajeEnviado{{ $mensaje->id }}1" colspan="9" class="anchofijo text-warning borderless collapse mensajeEnviado{{ $mensaje->id }} text-left">
                            @foreach ($mensaje->intervinientes as $intervinientes)
                                Enviado a: <span class="text-light">{{ $intervinientes->jugadores->nombre }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td id="mensajeEnviado{{ $mensaje->id }}2" rowspan="4" colspan="9" class="anchofijo text-light borderless collapse mensajeEnviado{{ $mensaje->id }} text-left">
                            {!! $mensaje->mensaje !!}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive ">
                <table id="mensajeEnviado{{ $mensaje->id }}3" class="table table-sm table-borderless text-center anchofijo collapse mensajeEnviado{{ $mensaje->id }}">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                <i class="fa fa-info-circle"></i> Eliminar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                <i class="fa fa-info-circle"></i> Reportar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                <i class="fa fa-info-circle"></i> Responder
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>