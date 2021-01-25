<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <th colspan="2" class="text-success text-center borderless align-middle">
                        <big>Creador: {{ $disenio->creador->nombre }}<big>
                    </th>
                    <th colspan="7" class="text-success text-center borderless align-middle">
                        <big>Modelo: {{ $disenio->nombre }}<big>
                    </th>
                    <th colspan="2" class="text-success text-center borderless align-middle">
                        <big>Cantidad:
                            {{ empty($disenio->estacionadas->cantidad) ? '0' : number_format($disenio->estacionadas->cantidad, 0, ',', '.') }}<big>
                    </th>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning borderless">
                        <img class="rounded" data-skin="1"
                            src="{{ asset('img/fotos naves/skin1/naveMT' . $disenio->fuselajes_id . '.jpg') }}"
                            width="180" height="119">
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Ataque
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Defensa
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Velocidad
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Consumo
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Municion
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Mantenimiento
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Carga
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Hangar cazas
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Hangar ligeras
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Hangar medias
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-{{ $disenio->viewDisenios->ataque > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->ataque, 0, ',', '.') }}
                    </td>
                    <td class="anchofijo text-{{ $disenio->viewDisenios->defensa > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->defensa, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->velocidad > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->velocidad, 0, ',', '.') }}
                    </td>
                    <td class="anchofijo text-{{ $disenio->viewDisenios->fuel > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->fuel, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->municion > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->municion, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->mantenimiento > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->mantenimiento, 0, ',', '.') }}
                    </td>
                    <td class="anchofijo text-{{ $disenio->viewDisenios->carga > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->carga, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->cargaPequenia > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->cargaPequenia, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->cargaMediana > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->cargaMediana, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->cargaGrande > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->cargaGrande, 0, ',', '.') }}
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Mineral
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Cristal
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Gas
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Plastico
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Cerámica
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Liquido
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Micros
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Personal
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Hangar pesadas
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Hangar estaciones
                    </td>
                </tr>
                <tr>
                    <td id="mineral{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->mineral > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->mineral, 0, ',', '.') }}
                    </td>
                    <td id="cristal{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->cristal > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->cristal, 0, ',', '.') }}
                    </td>
                    <td id="gas{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->gas > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->gas, 0, ',', '.') }}
                    </td>
                    <td id="plastico{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->plastico > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->plastico, 0, ',', '.') }}
                    </td>
                    <td id="ceramica{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->ceramica > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->ceramica, 0, ',', '.') }}
                    </td>
                    <td id="liquido{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->liquido > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->liquido, 0, ',', '.') }}
                    </td>
                    <td id="micros{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->micros > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->micros, 0, ',', '.') }}
                    </td>
                    <td id="personal{{ $disenio->id }}"
                        class="anchofijo text-{{ $disenio->costes->personal > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->costes->personal, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->cargaEnorme > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->cargaEnorme, 0, ',', '.') }}
                    </td>
                    <td
                        class="anchofijo text-{{ $disenio->viewDisenios->cargaMega > 0 ? 'light' : 'muted' }} borderless">
                        {{ number_format($disenio->viewDisenios->cargaMega, 0, ',', '.') }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-danger col-12"
                            onclick="reciclarDisenio({{ $disenio->id }})">
                            <i class="fa fa-info-circle"></i> Reciclar nave
                        </button>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 input-group-sm borderless">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">
                                    <button type="button" class="btn btn-dark text-warning">
                                        0
                                    </button>
                                </span>
                            </div>
                            <input type="text" class="form-control input" value="0" aria-label=""
                                aria-describedby="basic-addon2" id="disenio{{ $disenio->id }}"
                                onkeyup="recalculaCostos({{ $disenio->id }})">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">
                                    <button type="button" class="btn btn-dark text-warning">
                                        M
                                    </button>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 borderless">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">
                                    Tiempo
                                </span>
                            </div>
                            <input type="text" class="form-control input" value="0" aria-label=""
                                aria-describedby="basic-addon2" id="disenio{{ $disenio->id }}Tiempo">
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12"
                            onclick="construirDisenio({{ $disenio->id }})">
                            <i class="fa fa-plus-circle"></i> Construir
                        </button>
                    </td>
                </tr>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        <a type="button" class="btn btn-outline-danger col-12 text-danger"
                            href="{{ url('juego/disenio/borrarDisenio/' . $disenio->id) }}">
                            <i class="fa fa-times "></i> Borrar disenio
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12 " data-bs-toggle="modal"
                            data-bs-target="#datosModal">
                            <i class="fa fa-info-circle"></i> Datos
                        </button>
                    </td>
                    <td>
                        <a type="button" class="btn btn-outline-success col-12 text-success"
                            href="{{ url('juego/disenio/editarDisenio/' . $disenio->id) }}">
                            <i class="fa fa-edit"></i> Editar disenio
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
