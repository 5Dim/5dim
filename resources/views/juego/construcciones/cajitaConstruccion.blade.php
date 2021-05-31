<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center align-middle anchofijo" style="--bs-table-bg: transparent !important; margin-bottom: 0px !important;">
                <tr>
                    <td colspan="3" class="text-center align-middle">
                        <span class="text-success fw-bold fs-5">{{ __('construccion.' . $construccion->codigo) }}</span> <span class="text-success">nivel {{ $construccion->nivel }}</span>
                        <span class="text-warning">
                            {{ count($construccion->enConstrucciones) > 0 ? 'En cola nivel: ' . $construccion->enConstrucciones[count($construccion->enConstrucciones) - 1]->nivel : '' }}
                        </span>
                    </td>
                    <td colspan="1" class="text-success text-end align-middle fw-bold">Termina&nbsp;</td>
                    <td colspan="1" class="text-success text-start align-middle"
                        id="{{ 'termina' . $construccion->codigo }}"> </td>
                    <td colspan="1" class="text-success text-end align-middle fw-bold">Tarda:&nbsp;</td>
                    <td colspan="1" class="text-success text-start align-middle"
                        id="{{ 'tiempo' . $construccion->codigo }}"> </td>
                    <td colspan="1" class="text-success text-end">
                        <div class="input-group input-group-sm">
                            <input id="{{ 'personal' . $construccion->codigo }}" type="number" class="personal1 form-control input" min="0"
                                placeholder="personal" value="{{ number_format(floor($personal), 0, '', '') }}"
                                onkeyup='calculaTiempo(@json($construccion->coste), @json($velocidadConst->valor), @json($construccion->codigo))' >
                                <span class="input-group-text bg-dark text-light" style="padding: 0px">
                                    <button type="button" class="btn btn-dark btn-sm text-light" disabled>
                                        Personal
                                    </button>
                                </span>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning">
                        <img class="rounded"
                            src="{{ asset('img/juego/skin0/edificios/' . $construccion->codigo . '.jpg') }}" width="90"
                            height="90">
                    </td>
                </tr>
                <tr>
                    <td
                        class="anchofijo {{ $construccion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }}">
                        Mineral
                    </td>
                    <td
                        class="anchofijo {{ $construccion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }}">
                        cristal
                    </td>
                    <td
                        class="anchofijo {{ $construccion->coste->gas == 0 ? 'text-muted' : 'text-warning' }}">
                        Gas
                    </td>
                    <td
                        class="anchofijo {{ $construccion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }}">
                        Plástico
                    </td>
                    <td
                        class="anchofijo {{ $construccion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }}">
                        Cerámica
                    </td>
                    <td
                        class="anchofijo {{ $construccion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }}">
                        Liquido
                    </td>
                    <td
                        class="anchofijo {{ $construccion->coste->micros == 0 ? 'text-muted' : 'text-warning' }}">
                        Micros
                    </td>
                </tr>
                <tr>
                    @if ($construccion->coste->mineral > 0 and $construccion->coste->mineral > $recursos->mineral)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->mineral == '' ? $construccion->coste->mineral : number_format($construccion->coste->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->mineral > 0 and $construccion->coste->mineral < $recursos->
                            mineral)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->mineral == '' ? $construccion->coste->mineral : number_format($construccion->coste->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->cristal > 0 and $construccion->coste->cristal > $recursos->cristal)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->cristal == '' ? $construccion->coste->cristal : number_format($construccion->coste->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->cristal > 0 and $construccion->coste->cristal < $recursos->
                            cristal)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->cristal == '' ? $construccion->coste->cristal : number_format($construccion->coste->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->gas > 0 and $construccion->coste->gas > $recursos->gas)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->gas == '' ? $construccion->coste->gas : number_format($construccion->coste->gas, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->gas > 0 and $construccion->coste->gas < $recursos->gas)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->gas == '' ? $construccion->coste->gas : number_format($construccion->coste->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->plastico > 0 and $construccion->coste->plastico > $recursos->plastico)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->plastico == '' ? $construccion->coste->plastico : number_format($construccion->coste->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->plastico > 0 and $construccion->coste->plastico < $recursos->
                            plastico)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->plastico == '' ? $construccion->coste->plastico : number_format($construccion->coste->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->ceramica > 0 and $construccion->coste->ceramica > $recursos->ceramica)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->ceramica == '' ? $construccion->coste->ceramica : number_format($construccion->coste->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->ceramica > 0 and $construccion->coste->ceramica < $recursos->
                            ceramica)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->ceramica == '' ? $construccion->coste->ceramica : number_format($construccion->coste->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->liquido > 0 and $construccion->coste->liquido > $recursos->liquido)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->liquido == '' ? $construccion->coste->liquido : number_format($construccion->coste->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->liquido > 0 and $construccion->coste->liquido < $recursos->
                            liquido)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->liquido == '' ? $construccion->coste->liquido : number_format($construccion->coste->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->micros > 0 and $construccion->coste->micros > $recursos->micros)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->micros == '' ? $construccion->coste->micros : number_format($construccion->coste->micros, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->micros > 0 and $construccion->coste->micros < $recursos->micros)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->micros == '' ? $construccion->coste->micros : number_format($construccion->coste->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                </tr>
                <tr>
                    @if ($construccion->coste->mineral > 0 and $construccion->coste->mineral > $recursos->mineral)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->mineral == '' ? $construccion->coste->mineral : number_format($recursos->mineral - $construccion->coste->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->mineral > 0 and $construccion->coste->mineral < $recursos->
                            mineral)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->mineral == '' ? $construccion->coste->mineral : number_format($recursos->mineral - $construccion->coste->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->cristal > 0 and $construccion->coste->cristal > $recursos->cristal)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->cristal == '' ? $construccion->coste->cristal : number_format($recursos->cristal - $construccion->coste->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->cristal > 0 and $construccion->coste->cristal < $recursos->
                            cristal)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->cristal == '' ? $construccion->coste->cristal : number_format($recursos->cristal - $construccion->coste->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->gas > 0 and $construccion->coste->gas > $recursos->gas)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->gas == '' ? $construccion->coste->gas : number_format($recursos->gas - $construccion->coste->gas, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->gas > 0 and $construccion->coste->gas < $recursos->gas)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->gas == '' ? $construccion->coste->gas : number_format($recursos->gas - $construccion->coste->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->plastico > 0 and $construccion->coste->plastico > $recursos->plastico)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->plastico == '' ? $construccion->coste->plastico : number_format($recursos->plastico - $construccion->coste->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->plastico > 0 and $construccion->coste->plastico < $recursos->
                            plastico)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->plastico == '' ? $construccion->coste->plastico : number_format($recursos->plastico - $construccion->coste->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->ceramica > 0 and $construccion->coste->ceramica > $recursos->ceramica)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->ceramica == '' ? $construccion->coste->ceramica : number_format($recursos->ceramica - $construccion->coste->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->ceramica > 0 and $construccion->coste->ceramica < $recursos->
                            ceramica)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->ceramica == '' ? $construccion->coste->ceramica : number_format($recursos->ceramica - $construccion->coste->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->liquido > 0 and $construccion->coste->liquido > $recursos->liquido)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->liquido == '' ? $construccion->coste->liquido : number_format($recursos->liquido - $construccion->coste->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->liquido > 0 and $construccion->coste->liquido < $recursos->
                            liquido)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->liquido == '' ? $construccion->coste->liquido : number_format($recursos->liquido - $construccion->coste->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                    @if ($construccion->coste->micros > 0 and $construccion->coste->micros > $recursos->micros)
                        <td class="anchofijo text-danger">
                            {{ $construccion->coste->micros == '' ? $construccion->coste->micros : number_format($recursos->micros - $construccion->coste->micros, 0, ',', '.') }}
                        </td>
                    @elseif($construccion->coste->micros > 0 and $construccion->coste->micros < $recursos->micros)
                            <td class="anchofijo text-light">
                                {{ $construccion->coste->micros == '' ? $construccion->coste->micros : number_format($recursos->micros - $construccion->coste->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light">
                            </td>
                    @endif
                </tr>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo" style="margin-bottom: 5px !important;">
                <tr>
                    <td>
                        @if ($construccion->nivel > 0)
                            <button type="button" class="btn btn-outline-danger col-12"
                                onclick="sendReciclar('{{ $construccion->id }}', '{{ $construccion->codigo }}')">
                                <i class="fa fa-trash"></i> Reciclar
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-light col-12" disabled
                                onclick="sendReciclar('{{ $construccion->id }}', '{{ $construccion->codigo }}')">
                                <i class="fa fa-trash"></i> Reciclar
                            </button>
                        @endif
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-info col-12 " data-bs-toggle="modal"
                            data-bs-target="#datosModal"
                            onclick="mostrarDatosConstruccion('{{ $construccion->codigo }}')">
                            <i class="fa fa-info"></i> Información
                        </button>
                    </td>
                    @if (substr($construccion->codigo, 0, 3) == 'ind' and substr($construccion->codigo, 3) != 'Personal')
                        <td>
                            @if ($encendidoIndustrias[strtolower(substr($construccion->codigo, 3))] == 1)
                                <button type="button" class="btn btn-outline-danger col-12"
                                    onclick="sendIndustria('{{ strtolower(substr($construccion->codigo, 3)) }}')">
                                    <i class="fa fa-pause"></i> Parar la produccion
                                </button>
                            @else
                                <button type="button" class="btn btn-outline-success col-12"
                                    onclick="sendIndustria('{{ strtolower(substr($construccion->codigo, 3)) }}')">
                                    <i class="fa fa-play"></i> Encender la produccion
                                </button>
                            @endif
                        </td>
                    @endif
                    <td>
                        @if ($dependencia->nivelRequiere <= $nivel)
                            @if ($construccion->nivel >= 99 or $construccion->coste->mineral >
                            $recursos->mineral or $construccion->coste->cristal > $recursos->cristal or
                            $construccion->coste->gas > $recursos->gas or $construccion->coste->plastico >
                            $recursos->plastico or $construccion->coste->ceramica > $recursos->ceramica or
                            $construccion->coste->liquido > $recursos->liquido or $construccion->coste->micros >
                            $recursos->micros) <button type="button" class="btn
                            btn-outline-light col-12" disabled>
                            <i class="fa fa-arrow-alt-circle-up "></i> Construir
                            </button>
                        @else
                            <button type="button" class="btn btn-outline-success col-12"
                            onclick="sendConstruir('{{ $construccion->id }}',
                            '{{ $construccion->codigo }}', '{{ $tab }}')">
                            <i class="fa fa-arrow-alt-circle-up "></i> Construir
                            </button> @endif
                        @else
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-arrow-alt-circle-up "></i> Requiere
                                {{ strtolower(trans('construccion.' . $dependencia->codigoRequiere)) }} nivel
                                {{ $dependencia->nivelRequiere }}
                            </button>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    calculaTiempo(@json($construccion->coste), @json($velocidadConst->valor), @json($construccion->codigo));

</script>
