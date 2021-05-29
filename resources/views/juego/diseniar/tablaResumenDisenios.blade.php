<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo align-middle"
                style="margin-top: 5px !important">
                <tr>
                    <th colspan="12" class="text-success text-center borderless align-middle">
                        Resumen del diseño
                        {{ strtolower($disenio->tamanio) . ' ' . ucfirst(strtolower($disenio->codigo)) }}
                    </th>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Mineral" data-bs-content="Coste de fabricación de este recurso">
                            Mineral
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Cristal" data-bs-content="Coste de fabricación de este recurso">
                            Cristal
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Gas" data-bs-content="Coste de fabricación de este recurso">
                            Gas
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Plastico" data-bs-content="Coste de fabricación de este recurso">
                            Plastico
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Ceramica" data-bs-content="Coste de fabricación de este recurso">
                            Ceramica
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Liquidos" data-bs-content="Coste de fabricación de este recurso">
                            Liquidos
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Micros" data-bs-content="Coste de fabricación de este recurso">
                            Micros
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Fuel" data-bs-content="Cantidad que se toma como base para el cálculo del gasto al moverse según la distancia y el porcentaje de velocidad">
                            Fuel
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Fuel" data-bs-content="Cantidad de que se gasta en combate según el daño causado. Debe llevarse como carga en esta u otras naves de la flota para que la nave cause daño en combate. Esta cantidad suele ser necesaria para dos combates completos">
                            Municion
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Personal" data-bs-content="Cantidad de personal necesario para hacer funcionar la nave">
                            Personal
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Carga" data-bs-content="Cantidad de recursos que puede llevar">
                            Carga
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Recolección" data-bs-content="Cantidad de recursos por hora que es capaz de recolectar esta nave de asteroides">
                            Recolección
                        </a>
                    </td>
                </tr>
                <tr>
                    <td id="mineralD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->mineral, 0, ',', '.') }}
                    </td>
                    <td id="cristalD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->cristal, 0, ',', '.') }}
                    </td>
                    <td id="gasD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->gas, 0, ',', '.') }}
                    </td>
                    <td id="plasticoD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->plastico, 0, ',', '.') }}
                    </td>
                    <td id="ceramicaD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->ceramica, 0, ',', '.') }}
                    </td>
                    <td id="liquidoD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->liquido, 0, ',', '.') }}
                    </td>
                    <td id="microsD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->micros, 0, ',', '.') }}
                    </td>
                    <td id="fuelD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->gastoFuel, 0, ',', '.') }}
                    </td>
                    <td id="municionD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="personalD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->costes->personal, 0, ',', '.') }}
                    </td>
                    <td id="cargaD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="recolectorD" class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Energía" data-bs-content="Energia generada por los motores">
                            Energía
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Tiempo" data-bs-content="Tiempo en fabricarse en un hangar nivel 1">
                            Tiempo
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Mantenimiento" data-bs-content="Creditos por día que gasta la nave y la tripulación en su mantenimiento">
                            Mantenimiento
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Ataque total" data-bs-content="Daño por unidad de tiempo">
                            Ataque total
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Defensa" data-bs-content="Si en combate llega a 0 la nave es destruida">
                            Defensa
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Velocidad de impulso" data-bs-content="Esta velocidad es la que determina el movimiento dentro del sistema solar o en un combate">
                            Vel. Impulso
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Hypervelocidad" data-bs-content="Esta velocidad es la que determina el movimiento fuera del sistema solar">
                            Hypervelocidad
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Hangar cazas" data-bs-content="Cantidad de cazas que puede llevar">
                            Hangar cazas
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Hangar ligeras" data-bs-content="Cantidad de ligeras que puede llevar">
                            Hangar ligeras
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Hangar medias" data-bs-content="Cantidad de medias que puede llevar">
                            Hangar medias
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Hangar pesadas" data-bs-content="Cantidad de naves pesadas que puede llevar (sólo estaciones)">
                            Hangar pesadas
                        </a>
                    </td>
                    <td class="anchofijo text-warning borderless"
                        title="Capacidad de extracción de planetas (sólo estaciones)">
                        <a tabindex="0" type="button" class="btn btn-sm btn-dark text-warning" data-bs-toggle="popover" data-bs-trigger="focus"
                            title="Extracción" data-bs-content="Cantidad de recursos por hora que es capaz de recolectar esta nave de planetas (sólo estaciones)">
                            Extracción
                        </a>
                    </td>
                </tr>
                <tr>
                    <td id="energiaD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->energia, 0, ',', '.') }}
                    </td>
                    <td id="tiempoD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->tiempo, 0, ',', '.') }}
                    </td>
                    <td id="mantenimientoD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->mantenimiento, 0, ',', '.') }}
                    </td>
                    <td id="ataqueD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="defensaD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="maniobraD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->velocidad, 0, ',', '.') }}
                    </td>
                    <td id="velocidadD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->velocidad, 0, ',', '.') }}
                    </td>
                    <td id="cargaPequeniaD" class="anchofijo text-light borderless">
                        {{ number_format($disenio->cualidades->cargaPequenia, 0, ',', '.') }}
                    </td>
                    <td id="cargaMedianaD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="cargaGrandeD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="cargaEnormeD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="extractorD" class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo align-middle">
                <tr>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 borderless"
                            style="padding-left: 10px !important; padding-right: 5px !important">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">Nombre</span>
                            </div>
                            <input type="text" id="nombre" class="form-control input" placeholder="Nombre del disenio"
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 borderless"
                            style="padding-left: 5px !important; padding-right: 5px !important">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">Descripcion</span>
                            </div>
                            <input type="text" id="descripcion" class="form-control input"
                                placeholder="Descripcion del disenio" aria-label="Recipient's username"
                                aria-describedby="basic-addon2">
                        </div>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 borderless"
                            style="padding-left: 5px !important; padding-right: 5px !important">
                            <div class="input-group-prepend col-3">
                                <label class="input-group-text bg-dark text-light"
                                    for="posicionCombate">Posicion</label>
                            </div>
                            <select class="custom-select select col-9" id="posicionCombate">
                                <option value="" selected>Elige una posicion</option>

                                <option value="1">Vanguardia 1</option>
                                <option value="2">Vanguardia 2</option>
                                <option value="3">Vanguardia 3</option>

                                <option value="4">Centro 1</option>
                                <option value="5">Centro 2</option>
                                <option value="6">Centro 3</option>

                                <option value="7">Retaguardia 1</option>
                                <option value="8">Retaguardia 2</option>
                                <option value="9">Retaguardia 3</option>
                            </select>
                        </div>
                    </td>
                    @php
                        $texto = 'Se requiere el diseño';
                        $clase = 'btn-outline-light';
                        $deshabilitado = 'disabled';
                        if (
                            !empty(
                                Auth::user()
                                    ->jugador->fuselajes->where('id', $disenio->id)
                                    ->first()
                            )
                        ) {
                            if (
                                $disenio->id ==
                                Auth::user()
                                    ->jugador->fuselajes->where('id', $disenio->id)
                                    ->first()->id
                            ) {
                                $texto = 'Crear diseño';
                                $clase = 'btn-success';
                                $deshabilitado = '';
                            }
                        }
                    @endphp
                    <td>
                        <a id="crearDisenio" type="button" class="btn {{ $clase }} col-12"
                            onclick="crearDisenio()" {{ $deshabilitado }}>
                            <i class="fa fa-cogs"></i> {{ $texto }}
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
