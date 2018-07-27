<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                    @php
                        $clase = 'success';
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
                            <img class="rounded" data-skin="1" id ="imagen{{$fuselaje->id}}" src="{{ asset('img/fotos naves/skin1/naveMT' . $fuselaje->id . '.jpg') }}" width="180" height="119">
                            <button type="button" class="btn btn-outline-success btn-block btn-sm" onclick="changeSkin('{{$fuselaje->id}}')">
                                <i class="fa fa-arrows-alt-h"></i>
                            </button>
                        </td>
                        <td class="anchofijo text-warning borderless">Carga pequeña</td>
                        <td class="anchofijo text-warning borderless">Carga media</td>
                        <td class="anchofijo text-warning borderless">Carga grande</td>
                        <td class="anchofijo text-warning borderless">Mejoras</td>
                        <td class="anchofijo text-warning borderless">Blindaje</td>
                        <td class="anchofijo text-warning borderless">Energía</td>
                        <td class="anchofijo text-warning borderless">Cañón ligero</td>
                        <td class="anchofijo text-warning borderless">Cañón medio</td>
                        <td class="anchofijo text-warning borderless">Cañón pesado</td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->cargaPequeña }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->cargaMedia }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->cargaGrande }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->mejoras }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->blindajes }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->energia }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasLigeras }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasMedias }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasPesadas }}</td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-warning borderless">Velocidad</td>
                        <td class="anchofijo text-warning borderless">Velocidad max</td>
                        <td class="anchofijo text-warning borderless">Motores</td>
                        <td class="anchofijo text-warning borderless">Fuel</td>
                        <td class="anchofijo text-warning borderless">Mantenimiento</td>
                        <td class="anchofijo text-warning borderless">Tiempo</td>
                        <td class="anchofijo text-warning borderless">Cañón insertado</td>
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
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasInsertadas    border: 1px solid orange;
    border: 1px solid orange;
                            }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasBombas }}</td>
                        <td class="anchofijo text-light borderless">{{ $fuselaje->cualidades->armasMisiles }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive ">
                <table class="table table-sm table-borderless text-center anchofijo">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosFuselaje('{{$fuselaje->id}}')">
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
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" onclick="sendDiseñar('{{$fuselaje->id}}')" {{$desabilitado}}>
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
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm"  onclick="sendDesbloquear('{{$fuselaje->id}}')" {{$desabilitado}}>
                                <i class="fa fa-unlock-alt"></i> {{$texto}}
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>