@php
$clase = 'light';
if (!empty($fuselajesJugador->where('id', $fuselaje->id)->first())) {
if ($fuselaje->id == $fuselajesJugador->where('id', $fuselaje->id)->first()->id) {
$clase = 'success';
}
}
@endphp
<div class="row rounded cajita-{{ $clase }}">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <td colspan="4" class="text-{{ $clase }} text-center borderless align-middle">
                        <big>Modelo: {{ $fuselaje->codigo }}<big>
                    </td>
                    <td colspan="4" class="text-{{ $clase }} text-center borderless align-middle">
                        <big>Propiedad de {{ $fuselaje->categoria }}<big>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning borderless">
                        <img class="rounded" data-skin="1" id="imagen{{ $fuselaje->id }}"
                            src="{{ asset('img/fotos naves/skin1/naveMT' . $fuselaje->id . '.jpg') }}" width="180"
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
                        Velocidad max</td>
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
                        {{ $fuselaje->cualidades->velocidadMax }}
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
                    @php
                    $text = 'Diseniar';
                    $clase = 'success';
                    if (empty($fuselajesJugador->where('id', $fuselaje->id)->first())) {
                    // $desabilitado = 'disabled';
                    $text = 'Probar disenio';
                    $clase = 'info';
                    }
                    @endphp
                    <td>
                        <button type="button" class="btn btn-outline-{{ $clase }} col-12 btn-sm"
                            onclick="sendDiseniar('{{ $fuselaje->id }}')">
                            <i class="fa fa-cogs"></i> {{$text}}
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
                    @endphp
                    <td>
                        <button type="button" class="btn btn-outline-{{ $clase }} col-12 btn-sm"
                            onclick="sendDesbloquear('{{ $fuselaje->id }}')" {{ $desabilitado }}>
                            <i class="fa fa-unlock-alt"></i> {{ $texto }}
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
