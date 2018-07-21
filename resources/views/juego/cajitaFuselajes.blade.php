<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                    @php
                        $clase = 'success';
                        if (!empty($fuselajesJugador->where('id', $fuselaje->id)->first())) {
                            if ($fuselaje->id == $fuselajesJugador->where('id', $fuselaje->id)->first()->id) {
                                $clase = 'warning';
                            }
                        }
                        if ($fuselaje->categoria == "alianza") {
                            $clase = 'danger';
                        }
                    @endphp
                    <tr>
                        <td colspan="5" class="text-{{$clase}} text-center borderless align-middle">
                            <big>Modelo: {{ $fuselaje->codigo }}<big>
                        </td>
                        <td colspan="5" class="text-{{$clase}} text-center borderless align-middle">
                            <big>Propiedad de {{ $fuselaje->categoria }}<big>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless">
                            <img class="rounded" src="{{ asset('img/fotos naves/skin1/naveMT' . $fuselaje->id . '.jpg') }}" width="180" height="119">
                        </td>
                        <td class="anchofijo text-warning borderless">Contenedor pequeño</td>
                        <td class="anchofijo text-warning borderless">Contenedor medio</td>
                        <td class="anchofijo text-warning borderless">Contenedor grande</td>
                        <td class="anchofijo text-warning borderless">Mejoras</td>
                        <td class="anchofijo text-warning borderless">Blindaje</td>
                        <td class="anchofijo text-warning borderless">Energia</td>
                        <td class="anchofijo text-warning borderless">Cañon ligero</td>
                        <td class="anchofijo text-warning borderless">Cañon medio</td>
                        <td class="anchofijo text-warning borderless">Cañon pesado</td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->cargaPequeña }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->cargaMedia }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->cargaGrande }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->mejoras }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->blindajes }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->energia }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasLigera }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasMedia }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasPesadas }}</td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-warning borderless">Velocidad</td>
                        <td class="anchofijo text-warning borderless">Velocidad max</td>
                        <td class="anchofijo text-warning borderless">Motores</td>
                        <td class="anchofijo text-warning borderless">Fuel</td>
                        <td class="anchofijo text-warning borderless">Mantenimiento</td>
                        <td class="anchofijo text-warning borderless">Tiempo</td>
                        <td class="anchofijo text-warning borderless">Cañon insertado</td>
                        <td class="anchofijo text-warning borderless">Bombas</td>
                        <td class="anchofijo text-warning borderless">Misiles</td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->velocidad }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->velocidadMax }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->motores }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->gastoFuel }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->mantenimiento }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->tiempo }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasInsertada }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasBombas }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasMisiles }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive-sm ">
                <table class="table table-sm table-borderless text-center anchofijo">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                <i class="fa fa-info-circle"></i> Datos
                            </button>
                        </td>
                        @php
                            $desabilitado = '';
                            $clase = 'success';
                            if (empty($fuselajesJugador->where('id', $fuselaje->id)->first())) {
                                $desabilitado = 'disabled';
                                $clase = 'light';
                            }
                        @endphp
                        <td>
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" {{$desabilitado}}>
                                <i class="fa fa-cogs"></i> Diseñar
                            </button>
                        </td>
                        @php
                            $texto = ' Desbloquear';
                            $desabilitado = '';
                            $clase = 'success';
                            if (!empty($fuselajesJugador->where('id', $fuselaje->id)->first())) {
                                if ($fuselaje->id == $fuselajesJugador->where('id', $fuselaje->id)->first()->id) {
                                    $clase = 'light';
                                    $desabilitado = 'disabled';
                                    $texto = ' Ya en propiedad';
                                }
                            }
                            if ($fuselaje->categoria == "alianza") {
                                $clase = 'light';
                                $desabilitado = 'disabled';
                            }
                        @endphp
                        <td>
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" {{$desabilitado}}>
                                <i class="fa fa-unlock-alt"></i> {{$texto}}
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>