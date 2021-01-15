<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless table-sm text-center">
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
                    <th class="text-success text-center align-middle">

                    </th>
                </tr>
                @foreach ($miembros as $miembro)
                <tr>
                    <td class="text-light text-center align-middle">
                        <img src="{{ $miembro->avatar }}" alt="" width="60px" height="60px">
                    </td>
                    <td class="text-light text-center align-middle">
                        {{ $miembro->nombre }}
                    </td>
                    <td class="text-light text-center align-middle">
                        {{ number_format($miembro->puntos_construccion, 0,",",".") }}
                    </td>
                    <td class="text-light text-center align-middle">
                        {{ number_format($miembro->puntos_investigacion, 0,",",".") }}
                    </td>
                    <td class="text-light text-center align-middle">
                        {{ number_format($miembro->puntos_flotas, 0,",",".") }}
                    </td>
                    <td class="text-light text-center align-middle">
                        {{ number_format(($miembro->puntos_construccion + $miembro->puntos_investigacion + $miembro->puntos_flotas), 0,",",".") }}
                    </td>
                    <td class="text-light text-center align-middle">
                        <a class="btn btn-outline-danger btn-block btn-sm"
                            href="{{ url('juego/expulsarMiembro/' . $miembro->id) }}" role="button">
                            <i class="fa fa-times"></i> Expulsar
                        </a>
                    </td>
                </tr>
                <tr>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
