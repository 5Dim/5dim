<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <td colspan="4" class="text-success text-center borderless align-middle">
                        {{ trans('investigacion.' . $investigacion->codigo) }} nivel {{ $investigacion->nivel }} (de 90)
                        <span class="text-warning">
                            {{ count($investigacion->eninvestigaciones) > 0 ? 'En cola nivel: ' . $investigacion->eninvestigaciones[count($investigacion->eninvestigaciones) - 1]->nivel : '' }}
                        </span>
                    </td>
                    <td colspan="3" class="text-success text-center borderless align-middle"
                        id="{{ 'termina' . $investigacion->codigo }}">Termina:</td>
                    <td colspan="3" class="text-success text-center borderless align-middle"
                        id="{{ 'tiempo' . $investigacion->codigo }}">Tiempo:</td>
                    <td colspan="2" class="text-success text-right borderless align-middle">
                        <input id="{{ 'personal' . $investigacion->codigo }}" type="number" class="personal1 input"
                            placeholder="personal" value="{{ number_format($personal - 1, 0, '', '') }}"
                            onkeyup='calculaTiempoInvestigacion(@json($investigacion->coste), @json($velInvest->valor), @json($investigacion->codigo), @json($investigacion->nivel), @json($nivelLaboratorio->nivel))'>
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded"
                            src="{{ asset('img/juego/skin0/investigaciones/' . $investigacion->codigo . '.jpg') }}"
                            width="90" height="90"></td>
                    <td colspan="11" class="borderless">&nbsp;</td>
                </tr>
                <tr>
                    <td
                        class="anchofijo {{ $investigacion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Mineral</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        cristal</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Gas</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Plástico</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Cerámica</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Liquido</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Micros
                    </td>
                    <td
                        class="anchofijo {{ $investigacion->coste->fuel == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Fuel
                    </td>
                    <td
                        class="anchofijo {{ $investigacion->coste->ma == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        M-A</td>
                    <td
                        class="anchofijo {{ $investigacion->coste->municion == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Munición</td>
                    <td class="anchofijo text-muted borderless">Personal</td>
                </tr>
                <tr>
                    @if ($investigacion->coste->mineral > 0 and $investigacion->coste->mineral > $recursos->mineral)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($investigacion->coste->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->mineral > 0 and $investigacion->coste->mineral < $recursos->
                            mineral)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($investigacion->coste->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->cristal > 0 and $investigacion->coste->cristal > $recursos->cristal)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($investigacion->coste->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->cristal > 0 and $investigacion->coste->cristal < $recursos->
                            cristal)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($investigacion->coste->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->gas > 0 and $investigacion->coste->gas > $recursos->gas)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($investigacion->coste->gas, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->gas > 0 and $investigacion->coste->gas < $recursos->gas)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($investigacion->coste->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->plastico > 0 and $investigacion->coste->plastico > $recursos->plastico)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($investigacion->coste->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->plastico > 0 and $investigacion->coste->plastico < $recursos->
                            plastico)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($investigacion->coste->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica > $recursos->ceramica)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($investigacion->coste->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica < $recursos->
                            ceramica)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($investigacion->coste->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->liquido > 0 and $investigacion->coste->liquido > $recursos->liquido)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($investigacion->coste->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->liquido > 0 and $investigacion->coste->liquido < $recursos->
                            liquido)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($investigacion->coste->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->micros > 0 and $investigacion->coste->micros > $recursos->micros)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($investigacion->coste->micros, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->micros > 0 and $investigacion->coste->micros < $recursos->micros)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($investigacion->coste->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->fuel > 0 and $investigacion->coste->fuel > $recursos->fuel)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($investigacion->coste->fuel, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->fuel > 0 and $investigacion->coste->fuel < $recursos->fuel)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($investigacion->coste->fuel, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->ma > 0 and $investigacion->coste->ma > $recursos->ma)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($investigacion->coste->ma, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ma > 0 and $investigacion->coste->ma < $recursos->ma)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($investigacion->coste->ma, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->municion > 0 and $investigacion->coste->municion > $recursos->municion)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($investigacion->coste->municion, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->municion > 0 and $investigacion->coste->municion < $recursos->municion)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($investigacion->coste->municion, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->personal > 0 and $investigacion->coste->personal > $recursos->personal)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->personal == '' ? $investigacion->coste->personal : number_format($investigacion->coste->personal, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->personal > 0 and $investigacion->coste->personal < $recursos->personal)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->personal == '' ? $investigacion->coste->personal : number_format($investigacion->coste->personal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                </tr>
                <tr>
                    @if ($investigacion->coste->mineral > 0 and $investigacion->coste->mineral > $recursos->mineral)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($recursos->mineral - $investigacion->coste->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->mineral > 0 and $investigacion->coste->mineral < $recursos->
                            mineral)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($recursos->mineral - $investigacion->coste->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->cristal > 0 and $investigacion->coste->cristal > $recursos->cristal)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($recursos->cristal - $investigacion->coste->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->cristal > 0 and $investigacion->coste->cristal < $recursos->
                            cristal)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($recursos->cristal - $investigacion->coste->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->gas > 0 and $investigacion->coste->gas > $recursos->gas)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($recursos->gas - $investigacion->coste->gas, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->gas > 0 and $investigacion->coste->gas < $recursos->gas)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($recursos->gas - $investigacion->coste->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->plastico > 0 and $investigacion->coste->plastico > $recursos->plastico)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($recursos->plastico - $investigacion->coste->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->plastico > 0 and $investigacion->coste->plastico < $recursos->
                            plastico)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($recursos->plastico - $investigacion->coste->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica > $recursos->ceramica)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($recursos->ceramica - $investigacion->coste->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica < $recursos->
                            ceramica)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($recursos->ceramica - $investigacion->coste->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->liquido > 0 and $investigacion->coste->liquido > $recursos->liquido)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($recursos->liquido - $investigacion->coste->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->liquido > 0 and $investigacion->coste->liquido < $recursos->
                            liquido)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($recursos->liquido - $investigacion->coste->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->micros > 0 and $investigacion->coste->micros > $recursos->micros)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($recursos->micros - $investigacion->coste->micros, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->micros > 0 and $investigacion->coste->micros < $recursos->micros)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($recursos->micros - $investigacion->coste->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->fuel > 0 and $investigacion->coste->fuel > $recursos->fuel)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($recursos->fuel - $investigacion->coste->fuel, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->fuel > 0 and $investigacion->coste->fuel < $recursos->fuel)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($recursos->fuel - $investigacion->coste->fuel, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->ma > 0 and $investigacion->coste->ma > $recursos->ma)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($recursos->ma - $investigacion->coste->ma, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ma > 0 and $investigacion->coste->ma < $recursos->ma)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($recursos->ma - $investigacion->coste->ma, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->municion > 0 and $investigacion->coste->municion > $recursos->municion)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($recursos->municion - $investigacion->coste->municion, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->municion > 0 and $investigacion->coste->municion < $recursos->municion)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($recursos->municion - $investigacion->coste->municion, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($investigacion->coste->personal > 0 and $investigacion->coste->personal > $recursos->personal)
                        <td class="anchofijo text-danger borderless">
                            {{ $investigacion->coste->personal == '' ? $investigacion->coste->personal : number_format($recursos->personal - $investigacion->coste->personal, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->personal > 0 and $investigacion->coste->personal < $recursos->personal)
                            <td class="anchofijo text-light borderless">
                                {{ $investigacion->coste->personal == '' ? $investigacion->coste->personal : number_format($recursos->personal - $investigacion->coste->personal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class="anchofijo text-light borderless">
                            </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12 borderless">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        @php
                        //Posible boton de proto
                        @endphp
                        <button type="button" class="btn btn-outline-primary col-12" data-bs-toggle="modal"
                            data-bs-target="#datosModal"
                            onclick="mostrarDatosInvestigacion('{{ $investigacion->codigo }}')">
                            <i class="fa fa-question"></i> nombre prototipo desbloqueado
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary col-12" data-bs-toggle="modal"
                            data-bs-target="#datosModal"
                            onclick="mostrarDatosInvestigacion('{{ $investigacion->codigo }}')">
                            <i class="fa fa-info-circle"></i> Datos
                        </button>
                    </td>
                    <td>
                        @if ($dependencia->nivelRequiere <= $nivel)
                            @if ($investigacion->nivel >= 99 or $investigacion->coste->mineral > $recursos->mineral or $investigacion->coste->cristal > $recursos->cristal or $investigacion->coste->gas > $recursos->gas or $investigacion->coste->plastico > $recursos->plastico or $investigacion->coste->ceramica > $recursos->ceramica or $investigacion->coste->liquido > $recursos->liquido or $investigacion->coste->micros > $recursos->micros)
                                <button type="button" class="btn btn-outline-light col-12" disabled
                                    onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}', '{{ $tab }}')">
                                    <i class="fa fa-arrow-alt-circle-up "></i> construir
                                </button>
                            @else
                                <button type="button" class="btn btn-outline-success col-12"
                                    onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}', '{{ $tab }}')">
                                    <i class="fa fa-arrow-alt-circle-up "></i> construir
                                </button>
                            @endif
                        @else
                            <button type="button" class="btn btn-outline-light col-12" disabled
                                onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}', '{{ $tab }}')">
                                <i class="fa fa-arrow-alt-circle-up "></i> Requiere {{ strtolower(trans('investigacion.' .  $dependencia->codigoRequiere)) }} nivel {{$dependencia->nivelRequiere}}
                            </button>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script>
    calculaTiempoInvestigacion(@json($investigacion->coste), @json($velInvest->valor), @json($investigacion->
        codigo), @json($investigacion->nivel), @json($nivelLaboratorio->nivel));

</script>
