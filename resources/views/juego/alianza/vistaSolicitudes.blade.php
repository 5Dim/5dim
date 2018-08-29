<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless table-sm text-center" >
                    <tr>
                        <th colspan="6" class="text-success text-center align-middle">
                            Solicitudes pendientes
                        </th>
                    </tr>
                    <tr>
                        <th class="text-success text-center align-middle">
                            Avatar
                        </th>
                        <th class="text-success text-center align-middle">
                            Nombre
                        </th>
                        <th class="text-success text-center align-middle">
                            Puntos construcciones
                        </th>
                        <th class="text-success text-center align-middle">
                            Puntos investigaciones
                        </th>
                        <th class="text-success text-center align-middle">
                            Puntos flotas
                        </th>
                        <th class="text-success text-center align-middle">
                            Puntos totales
                        </th>
                    </tr>
                    @foreach ($solicitudes as $solicitud)
                        <tr>
                            <td class="text-light text-center align-middle">
                                <img src="{{ $solicitud->jugadores->avatar }}" alt="" width="60px" height="60px">
                            </td>
                            <td class="text-light text-center align-middle">
                                {{ $solicitud->jugadores->nombre }}
                            </td>
                            <td class="text-light text-center align-middle">
                                {{ number_format($solicitud->jugadores->puntos_construccion, 0,",",".") }}
                            </td>
                            <td class="text-light text-center align-middle">
                                {{ number_format($solicitud->jugadores->puntos_investigacion, 0,",",".") }}
                            </td>
                            <td class="text-light text-center align-middle">
                                {{ number_format($solicitud->jugadores->puntos_flotas, 0,",",".") }}
                            </td>
                            <td class="text-light text-center align-middle">
                                {{ number_format(($solicitud->jugadores->puntos_construccion + $solicitud->jugadores->puntos_investigacion + $solicitud->jugadores->puntos_flotas), 0,",",".") }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="text-light text-center align-middle" style="border: 2px solid darkgray">
                                {!! $solicitud->solicitud !!}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" width="50%">
                                <a class="btn btn-outline-danger btn-block btn-sm" href="{{ url('juego/rechazarSolicitud/' . $solicitud->id) }}" role="button">
                                    <i class="fa fa-times"></i> Rechazar
                                </a>
                            </td>
                            <td colspan="3" width="50%">
                                <a class="btn btn-outline-success btn-block btn-sm" href="{{ url('juego/aceptarSolicitud/' . $solicitud->id) }}" role="button">
                                    <i class="fa fa-check-square"></i> Aceptar
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
