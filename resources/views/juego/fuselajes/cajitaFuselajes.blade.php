{{-- <div
    class="row rounded cajita-{{ empty($fuselajesJugador->where('id', $fuselaje->id)->first()->id) ? 'warning' : 'success' }}">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center "
                style="--bs-table-bg: transparent !important; margin-bottom: 0px !important;">
                <tr>
                    <td rowspan="5" class=" text-warning align-middle" style="max-width: 230px; width: 230px;">
                        <img class="img-fluid" data-skin="1" id="imagen{{ $fuselaje->id }}"
                            src="{{ asset('img/fotos naves/skin1/nave' . $fuselaje->id . '.png') }}">
                    </td>
                    @if (empty($fuselajesJugador->where('id', $fuselaje->id)->first()->id))
                        <td colspan="6" class="text-warning text-center align-middle fw-bold fs-5">
                            <span>Modelo: {{ ucfirst(strtolower($fuselaje->codigo)) }}</span>
                        </td>
                    @else
                        <td colspan="6" class="text-success text-center align-middle fw-bold fs-5">
                            <span class="fw-bold">Modelo: {{ ucfirst(strtolower($fuselaje->codigo)) }}</span>
                        </td>
                    @endif
                    <td></td>
                </tr>
                <tr>
                    <td class=" text-{{ $fuselaje->cualidades->cargaPequenia > 0 ? 'warning' : 'muted' }}">
                        Carga pequeña</td>
                    <td class=" text-{{ $fuselaje->cualidades->cargaMedia > 0 ? 'warning' : 'muted' }}">
                        Carga media</td>
                    <td class=" text-{{ $fuselaje->cualidades->mejoras > 0 ? 'warning' : 'muted' }}">
                        Mejoras</td>
                    <td class=" text-{{ $fuselaje->cualidades->blindajes > 0 ? 'warning' : 'muted' }}">
                        Blindaje</td>
                    <td class=" text-{{ $fuselaje->cualidades->armasLigeras > 0 ? 'warning' : 'muted' }}">
                        Canión ligero</td>
                    <td class=" text-{{ $fuselaje->cualidades->armasMedias > 0 ? 'warning' : 'muted' }}">
                        Canión medio</td>
                    <td class=" text-{{ $fuselaje->cualidades->armasPesadas > 0 ? 'warning' : 'muted' }}">
                        Canión pesado</td>
                </tr>
                <tr>
                    <td class=" text-{{ $fuselaje->cualidades->cargaPequenia > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaPequenia }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->cargaMedia > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaMedia }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->mejoras > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->mejoras }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->blindajes > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->blindajes }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->armasLigeras > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasLigeras }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->armasMedias > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasMedias }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->armasPesadas > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasPesadas }}
                    </td>
                </tr>
                <tr>
                    <td class=" text-{{ $fuselaje->cualidades->cargaGrande > 0 ? 'warning' : 'muted' }}">
                        Carga grande</td>
                    <td class=" text-{{ $fuselaje->cualidades->cargaEnorme > 0 ? 'warning' : 'muted' }}">
                        Carga Enorme</td>
                    <td class=" text-{{ $fuselaje->cualidades->velocidadMax > 0 ? 'warning' : 'muted' }}">
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->motores > 0 ? 'warning' : 'muted' }}">
                        Motores</td>
                    <td class=" text-{{ $fuselaje->cualidades->armasInsertadas > 0 ? 'warning' : 'muted' }}">
                        Canión insertado</td>
                    <td class=" text-{{ $fuselaje->cualidades->armasBombas > 0 ? 'warning' : 'muted' }}">
                        Bombas</td>
                    <td class=" text-{{ $fuselaje->cualidades->armasMisiles > 0 ? 'warning' : 'muted' }}">
                        Misiles</td>
                </tr>
                <tr>
                    <td class=" text-{{ $fuselaje->cualidades->cargaGrande > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaGrande }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->cargaEnorme > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->cargaEnorme }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->velocidadMax > 0 ? 'light' : 'muted' }}">

                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->motores > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->motores }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->armasInsertadas > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasInsertadas }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->armasBombas > 0 ? 'light' : 'muted' }}">
                        {{ $fuselaje->cualidades->armasBombas }}
                    </td>
                    <td class=" text-{{ $fuselaje->cualidades->armasMisiles > 0 ? 'light' : 'muted' }}">
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
                    @if (empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
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
                        @if ($nivelEnsamblajeFuselajes >= $fuselaje->coste)
                            <td>
                                <button type="button" class="btn btn-outline-success col-12"
                                    onclick="sendDesbloquear('{{ $fuselaje->id }}', '{{ $tab }}')">
                                    <i class="fa fa-unlock-alt"></i> Desbloquear
                                </button>
                            </td>
                        @else
                            <td>
                                <button type="button" class="btn btn-outline-light col-12" disabled>
                                    <i class="fa fa-unlock-alt"></i> Necesitas nivel {{ $fuselaje->coste }} de
                                    {{ strtolower(trans('investigacion.invEnsamblajeFuselajes')) }}
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
</div> --}}


<div class="cajita-warning rounded text-center p-2">
    {{-- CABECERA --}}
    <div class="row align-items-center">
        <div class="col text-success fs-5 fw-bold">
            Modelo: {{ ucfirst(strtolower($fuselaje->codigo)) }}
        </div>
    </div>

    {{-- CUERPO --}}
    <div class="row align-items-center">
        <div class="row">
            <div class="col d-none d-sm-block">
                <img class="img-fluid" data-skin="1" id="imagen{{ $fuselaje->id }}"
                    src="{{ asset('img/fotos naves/skin1/nave' . $fuselaje->id . '.png') }}" width="150" >
            </div>
            <div class="col {{ $fuselaje->cualidades->cargaPequenia == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->cargaPequenia == 0 ? 'text-muted' : 'text-success' }}">
                        Carga pequeña
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->cargaPequenia > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->cargaPequenia }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->cargaMedia == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->cargaMedia == 0 ? 'text-muted' : 'text-success' }}">
                        Carga media
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->cargaMedia > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->cargaMedia }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->cargaGrande == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->cargaGrande == 0 ? 'text-muted' : 'text-success' }}">
                        Carga grande
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->cargaGrande > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->cargaGrande }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->cargaEnorme == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->cargaEnorme == 0 ? 'text-muted' : 'text-success' }}">
                        Carga enorme
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->cargaEnorme > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->cargaEnorme }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->mejoras == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->mejoras == 0 ? 'text-muted' : 'text-warning' }}">
                        Mejoras
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->mejoras > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->mejoras }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->blindajes == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->blindajes == 0 ? 'text-muted' : 'text-warning' }}">
                        Blindajes
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->blindajes > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->blindajes }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->motores == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->motores == 0 ? 'text-muted' : 'text-warning' }}">
                        Motores
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->motores > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->motores }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->armasLigeras == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->armasLigeras == 0 ? 'text-muted' : 'text-danger' }}">
                        Cañón ligeras
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->armasLigeras > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->armasLigeras }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->armasMedias == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->armasMedias == 0 ? 'text-muted' : 'text-danger' }}">
                        Cañón medias
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->armasMedias > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->armasMedias }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->armasPesadas == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->armasPesadas == 0 ? 'text-muted' : 'text-danger' }}">
                        Cañón pesado
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->armasPesadas > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->armasPesadas }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->armasInsertadas == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->armasInsertadas == 0 ? 'text-muted' : 'text-danger' }}">
                        Cañón insertado
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->armasInsertadas > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->armasInsertadas }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->armasBombas == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->armasBombas == 0 ? 'text-muted' : 'text-danger' }}">
                        Bombas
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->armasBombas > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->armasBombas }}
                    </div>
                </div>
            </div>
            <div class="col {{ $fuselaje->cualidades->armasMisiles == 0 ? 'd-none d-xxl-block' : '' }}">
                <div class="row">
                    <div
                        class="col p-1 {{ $fuselaje->cualidades->armasMisiles == 0 ? 'text-muted' : 'text-danger' }}">
                        Misiles
                    </div>
                </div>
                <div class="row">
                    <div class="col p-1 {{ $fuselaje->cualidades->armasMisiles > 0 ? 'text-light' : 'text-muted' }}">
                        {{ $fuselaje->cualidades->armasMisiles }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTONERA --}}
    <div class="row align-items-center">
        <div class="col">
            <button type="button" class="btn btn-outline-info col-12 " data-bs-toggle="modal"
                data-bs-target="#datosModal" onclick="mostrarDatosFuselaje('{{ $fuselaje->id }}')">
                <i class="fa fa-info"></i> Información
            </button>
        </div>

        @if (empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
            <div class="col">
                <td>
                    <button type="button" class="btn btn-outline-primary col-12"
                        onclick="sendDiseniar('{{ $fuselaje->id }}')">
                        <i class="fa fa-cog"></i> Probar diseño
                    </button>
                </td>
            </div>
        @endif

        <div class="col">
            @if (empty($fuselajesJugador->where('id', $fuselaje->id)->first()))
                @if ($nivelEnsamblajeFuselajes >= $fuselaje->coste)
                    <td>
                        <button type="button" class="btn btn-outline-success col-12"
                            onclick="sendDesbloquear('{{ $fuselaje->id }}', '{{ $tab }}')">
                            <i class="fa fa-unlock-alt"></i> Desbloquear
                        </button>
                    </td>
                @else
                    <td>
                        <button type="button" class="btn btn-outline-light col-12" disabled>
                            <i class="fa fa-unlock-alt"></i> Necesitas nivel {{ $fuselaje->coste }} de
                            {{ strtolower(trans('investigacion.invEnsamblajeFuselajes')) }}
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
        </div>
    </div>
</div>
