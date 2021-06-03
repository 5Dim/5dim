<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-dark table-sm text-center table-borderless anchofijo rounded align-middle" style="--bs-table-bg: transparent !important">
                <tr>
                    <th colspan="6" class="text-success">
                        Solicitudes pendientes
                    </th>
                </tr>
                <tr>
                    <th class="text-success">
                        Avatar
                    </th>
                    <th class="text-success">
                        Nombre
                    </th>
                    <th class="text-success">
                        Puntos construcciones
                    </th>
                    <th class="text-success">
                        Puntos investigaciones
                    </th>
                    <th class="text-success">
                        Puntos flotas
                    </th>
                    <th class="text-success">
                        Puntos totales
                    </th>
                </tr>
                @foreach ($solicitudes as $solicitud)
                    <tr>
                        <td class="">
                            <img src="{{ $solicitud->jugadores->avatar }}" alt="" width="60px" height="60px">
                        </td>
                        <td class="">
                            {{ $solicitud->jugadores->nombre }}
                        </td>
                        <td class="">
                            {{ number_format($solicitud->jugadores->puntos_construccion, 0, ',', '.') }}
                        </td>
                        <td class="">
                            {{ number_format($solicitud->jugadores->puntos_investigacion, 0, ',', '.') }}
                        </td>
                        <td class="">
                            {{ number_format($solicitud->jugadores->puntos_flotas, 0, ',', '.') }}
                        </td>
                        <td class="">
                            {{ number_format($solicitud->jugadores->puntos_construccion + $solicitud->jugadores->puntos_investigacion + $solicitud->jugadores->puntos_flotas, 0, ',', '.') }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" class="" style="border: -1px solid white">
                            {!! $solicitud->solicitud !!}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <a class="btn btn-outline-danger col-12 btn-sm"
                                href="{{ url('juego/rechazarSolicitud/' . $solicitud->id) }}" role="button">
                                <i class="fa fa-times"></i> Rechazar
                            </a>
                        </td>
                        <td colspan="3">
                            <a class="btn btn-outline-success col-12 btn-sm"
                                href="{{ url('juego/aceptarSolicitud/' . $solicitud->id) }}" role="button">
                                <i class="fa fa-check-square"></i> Aceptar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
