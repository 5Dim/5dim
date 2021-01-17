<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <th colspan="10" class="text-success text-center borderless align-middle">
                        Resumen del disenio {{ strtoupper($disenio->tamanio . ' ' . $disenio->codigo) }}
                    </th>
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
                        Ceramica
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Liquido
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Micros
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Fuel
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Municion
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Personal
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Carga
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
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Energía
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Tiempo
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Mantenimiento
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Ataque total
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Defensa
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Velocidad
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
                    <td class="anchofijo text-warning borderless">
                        Hangar pesadas
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Hangar estación
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
                    <td id="CargaMegaD" class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo">
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
                    $clase = 'light';
                    $deshabilitado = 'disabled';
                    if (!empty(Auth::user()->jugadores[0]->fuselajes->where('id', $disenio->id)->first())) {
                    if ($disenio->id == Auth::user()->jugadores[0]->fuselajes->where('id', $disenio->id)->first()->id) {
                    $texto = 'Diseniar';
                    $clase = 'primary';
                    $deshabilitado = '';
                    }
                    }
                    @endphp
                    <td>
                        <button type="button" class="btn btn-outline-{{ $clase }} col-12" onclick="crearDisenio()" {{ $deshabilitado }}>
                            <i class="fa fa-cogs"></i> {{ $texto }}
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
