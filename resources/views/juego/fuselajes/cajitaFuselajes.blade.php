@if(empty($fuselajesJugador->where('id', $fuselaje->id)->first()->id))
    <div class="row rounded cajita-warning">
@else
    <div class="row rounded cajita-success">
@endif
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center anchofijo" style="--bs-table-bg: transparent !important; margin-bottom: 0px !important;">
                <tr>
                    <td rowspan="5" class="anchofijo text-warning align-middle">
                        <img class="rounded" data-skin="1" id="imagen{{ $fuselaje->id }}"
                            src="{{ asset('img/fotos naves/skin1/nave' . $fuselaje->id . '.png') }}" width="240"
                            height="150">
                    </td>
                    @if(empty($fuselajesJugador->where('id', $fuselaje->id)->first()->id))
                        <td colspan="6" class="text-warning text-center align-middle fw-bold fs-5">
                            <span>Modelo: {{ ucfirst(strtolower($fuselaje->codigo)) }}</span>
                        </td>
                        {{-- <td colspan="4" class="text-warning text-center align-middle">
                            <span>Propiedad de {{ $fuselaje->categoria }}</span>
                        </td> --}}
                    @else
                        <td colspan="6" class="text-success text-center align-middle fw-bold fs-5">
                            <span class="fw-bold">Modelo: {{ ucfirst(strtolower($fuselaje->codigo)) }}</span>
                        </td>
                        {{-- <td colspan="4" class="text-success text-center align-middle">
                            <span>Propiedad de {{ $fuselaje->categoria }}</span>
                        </td> --}}
                    @endif
                    <td></td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaPequenia > 0 ? 'warning' : 'muted' }}">
                        Carga pequeña</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaMedia > 0 ? 'warning' : 'muted' }}">
                        Carga media</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->mejoras > 0 ? 'warning' : 'muted' }}">
                        Mejoras</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->blindajes > 0 ? 'warning' : 'muted' }}">
                        Blindaje</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasLigeras > 0 ? 'warning' : 'muted' }}">
                        Canión ligero</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMedias > 0 ? 'warning' : 'muted' }}">
                        Canión medio</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasPesadas > 0 ? 'warning' : 'muted' }}">
                        Canión pesado</td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaPequenia > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaPequenia }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaMedia > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaMedia }}
                    </td>
                    <td class="anchofijo text-{{ $fuselaje->cualidades->mejoras > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->mejoras }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->blindajes > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->blindajes }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasLigeras > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasLigeras }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMedias > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasMedias }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasPesadas > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasPesadas }}
                    </td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaGrande > 0 ? 'warning' : 'muted' }}">
                        Carga grande</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaEnorme > 0 ? 'warning' : 'muted' }}">
                        Carga Enorme</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->velocidadMax > 0 ? 'warning' : 'muted' }}">
                        </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->motores > 0 ? 'warning' : 'muted' }}">
                        Motores</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasInsertadas > 0 ? 'warning' : 'muted' }}">
                        Canión insertado</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasBombas > 0 ? 'warning' : 'muted' }}">
                        Bombas</td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMisiles > 0 ? 'warning' : 'muted' }}">
                        Misiles</td>
                </tr>
                <tr>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaGrande > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaGrande }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->cargaEnorme > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaEnorme }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->velocidadMax > 0 ? 'light' : 'muted' }}">

                    </td>
                    <td class="anchofijo text-{{ $fuselaje->cualidades->motores > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->motores }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasInsertadas > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasInsertadas }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasBombas > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasBombas }}
                    </td>
                    <td
                        class="anchofijo text-{{ $fuselaje->cualidades->armasMisiles > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasMisiles }}
                    </td>
                </tr>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo" style="margin-bottom: 5px !important;">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-info col-12 " data-bs-toggle="modal"
                            data-bs-target="#datosModal" onclick="mostrarDatosFuselaje('{{ $fuselaje->id }}')">
                            <i class="fa fa-info"></i> Información
                        </button>
                    </td>
                    @if(empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
                        <td>
                            <button type="button" class="btn btn-outline-primary col-12"
                                onclick="sendDiseniar('{{ $fuselaje->id }}')">
                                <i class="fa fa-cog"></i> Probar diseño
                            </button>
                        </td>
                    @else
                        <td>
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-cog"></i> Probar diseño
                            </button>
                        </td>
                    @endif
                    @if (empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
                        @if($nivelEnsamblajeFuselajes >= $fuselaje->coste)
                            <td>
                                <button type="button" class="btn btn-outline-success col-12"
                                    onclick="sendDesbloquear('{{ $fuselaje->id }}', '{{ $tab }}')">
                                    <i class="fa fa-unlock-alt"></i> Desbloquear
                                </button>
                            </td>
                        @else
                            <td>
                                <button type="button" class="btn btn-outline-light col-12" disabled>
                                    <i class="fa fa-unlock-alt"></i> Necesitas nivel {{$fuselaje->coste}} de {{ strtolower(trans('investigacion.invEnsamblajeFuselajes')) }}
                                </button>
                            </td>
                        @endif
                    @else
                        <td>
                            <button type="button" class="btn btn-outline-success col-12"
                                onclick="sendDiseniar('{{ $fuselaje->id }}')">
                                <i class="fa fa-cogs"></i> Diseñar
                            </button>
                        </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
</div>
