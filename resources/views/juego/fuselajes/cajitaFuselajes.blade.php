@if(empty($fuselajesJugador->where('id', $fuselaje->id)->first()->id))
    <div class="row rounded cajita-light">
@else
    <div class="row rounded cajita-success">
@endif
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <td colspan="4" class="text-light text-center borderless align-middle">
                        <big>Modelo: {{ ucfirst(strtolower($fuselaje->codigo)) }}<big>
                    </td>
                    <td colspan="4" class="text-light text-center borderless align-middle">
                        <big>Propiedad de {{ $fuselaje->categoria }}<big>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning borderless">
                        <img class="rounded" data-skin="1" id="imagen{{ $fuselaje->id }}"
                            src="{{ asset('img/fotos naves/skin1/nave' . $fuselaje->id . '.png') }}" width="180"
                            height="119">
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaPequenia > 0 ? 'warning' : 'muted' }} borderless">
                        Carga pequenia</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaMedia > 0 ? 'warning' : 'muted' }} borderless">
                        Carga media</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->mejoras > 0 ? 'warning' : 'muted' }} borderless">
                        Mejoras</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->blindajes > 0 ? 'warning' : 'muted' }} borderless">
                        Blindaje</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasLigeras > 0 ? 'warning' : 'muted' }} borderless">
                        Canión ligero</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMedias > 0 ? 'warning' : 'muted' }} borderless">
                        Canión medio</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasPesadas > 0 ? 'warning' : 'muted' }} borderless">
                        Canión pesado</td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaPequenia > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->cargaPequenia }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaMedia > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->cargaMedia }}
                    </td>
                    <td class="anchofijo text-{{ $fuselaje->cualidades->mejoras > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->mejoras }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->blindajes > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->blindajes }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasLigeras > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->armasLigeras }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMedias > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->armasMedias }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasPesadas > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->armasPesadas }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaGrande > 0 ? 'warning' : 'muted' }} borderless">
                        Carga grande</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaEnorme > 0 ? 'warning' : 'muted' }} borderless">
                        Carga Enorme</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->velocidadMax > 0 ? 'warning' : 'muted' }} borderless">
                        </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->motores > 0 ? 'warning' : 'muted' }} borderless">
                        Motores</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasInsertadas > 0 ? 'warning' : 'muted' }} borderless">
                        Canión insertado</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasBombas > 0 ? 'warning' : 'muted' }} borderless">
                        Bombas</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMisiles > 0 ? 'warning' : 'muted' }} borderless">
                        Misiles</td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaGrande > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->cargaGrande }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaEnorme > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->cargaEnorme }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->velocidadMax > 0 ? 'light' : 'muted' }} borderless">

                    </td>
                    <td class="anchofijo text-{{ $fuselaje->cualidades->motores > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->motores }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasInsertadas > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->armasInsertadas }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasBombas > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->armasBombas }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMisiles > 0 ? 'light' : 'muted' }} borderless">
                        {{ $fuselaje->cualidades->armasMisiles }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12 btn-sm " data-bs-toggle="modal"
                            data-bs-target="#datosModal" onclick="mostrarDatosFuselaje('{{ $fuselaje->id }}')">
                            <i class="fa fa-info-circle"></i> Datos
                        </button>
                    </td>
                    @if(empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
                        <td>
                            <button type="button" class="btn btn-outline-info col-12 btn-sm"
                                onclick="sendDiseniar('{{ $fuselaje->id }}')">
                                <i class="fa fa-cogs"></i> Probar diseño
                            </button>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-outline-success col-12 btn-sm"
                                onclick="sendDiseniar('{{ $fuselaje->id }}')">
                                <i class="fa fa-cogs"></i> Diseñar
                            </button>
                        </td>
                    @endif
                    @if (empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
                        @if($nivelEnsamblajeFuselajes >= $fuselaje->coste)
                            <td>
                                <button type="button" class="btn btn-outline-success col-12 btn-sm"
                                    onclick="sendDesbloquear('{{ $fuselaje->id }}', '{{ $tab }}')">
                                    <i class="fa fa-unlock-alt"></i> Desbloquear
                                </button>
                            </td>
                        @else
                            <td>
                                <button type="button" class="btn btn-outline-light col-12 btn-sm" disabled>
                                    <i class="fa fa-unlock-alt"></i> Necesitas nivel {{$fuselaje->coste}} de {{ strtolower(trans('investigacion.invEnsamblajeFuselajes')) }}
                                </button>
                            </td>
                        @endif
                    @else
                        <td>
                            <button type="button" class="btn btn-outline-light col-12 btn-sm" disabled>
                                <i class="fa fa-unlock-alt"></i> Ya disponible
                            </button>
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
</div>
