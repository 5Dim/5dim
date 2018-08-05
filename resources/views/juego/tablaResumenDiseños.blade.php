<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                <tr>
                    <th colspan="10" class="text-success text-center borderless align-middle">
                        Resumen del diseño {{strtoupper($diseño->tamaño." ".$diseño->codigo)}}
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
                        {{ number_format($diseño->costes->mineral, 0,",",".") }}
                    </td>
                    <td id="cristalD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->cristal, 0,",",".") }}
                    </td>
                    <td id="gasD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->gas, 0,",",".") }}
                    </td>
                    <td id="ceramicaD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->plastico, 0,",",".") }}
                    </td>
                    <td id="plasticoD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->ceramica, 0,",",".") }}
                    </td>
                    <td id="liquidoD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->liquido, 0,",",".") }}
                    </td>
                    <td id="microsD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->micros, 0,",",".") }}
                    </td>
                    <td id="fuelD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->cualidades->gastoFuel, 0,",",".") }}
                    </td>
                    <td id="municionD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="personalD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->costes->personal, 0,",",".") }}
                    </td>
                    <td id="cargaD" class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Energia
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
                        {{ number_format($diseño->cualidades->energia, 0,",",".") }}
                    </td>
                    <td id="tiempoD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->cualidades->tiempo, 0,",",".") }}
                    </td>
                    <td id="mantenimientoD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->cualidades->mantenimiento, 0,",",".") }}
                    </td>
                    <td id="ataqueD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="defensaD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="velocidadD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->cualidades->velocidad, 0,",",".") }}
                    </td>
                    <td id="cargaPequeñaD" class="anchofijo text-light borderless">
                        {{ number_format($diseño->cualidades->cargaPequeña, 0,",",".") }}
                    </td>
                    <td id="cargaMedianaD" class="anchofijo text-light borderless">
                        0
                    </td>
                    <td id="CargaGrandeD" class="anchofijo text-light borderless">
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
                            <div class="input-group mb-3 borderless" style="padding-left: 10px !important; padding-right: 5px !important">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-dark text-light">Nombre</span>
                                </div>
                                <input type="text" class="form-control input" placeholder="Nombre del diseño" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 borderless" style="padding-left: 5px !important; padding-right: 5px !important">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">Descripcion</span>
                            </div>
                            <input type="text" class="form-control input" placeholder="Descripcion del diseño" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        </div>
                    </td>
                    <td class="anchofijo text-secondary borderless">
                        <div class="input-group mb-3 borderless"  style="padding-left: 5px !important; padding-right: 5px !important">
                            <div class="input-group-prepend">
                                <label class="input-group-text bg-dark text-light" for="inputGroupSelect01">Posicion</label>
                            </div>
                            <select class="custom-select select" id="inputGroupSelect01">
                                    <option value="" selected>Elige una posicion</option>

                                    <option value="">Vanguardia 1</option>
                                    <option value="">Vanguardia 2</option>
                                    <option value="">Vanguardia 3</option>

                                    <option value="">Centro 1</option>
                                    <option value="">Centro 2</option>
                                    <option value="">Centro 3</option>

                                    <option value="">Retaguardia 1</option>
                                    <option value="">Retaguardia 2</option>
                                    <option value="">Retaguardia 3</option>
                            </select>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosConstruccion('')">
                            <i class="fa fa-cogs"></i> Diseñar
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>