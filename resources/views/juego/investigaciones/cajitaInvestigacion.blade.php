<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center " style="--bs-table-bg: transparent !important; margin-bottom: 0px !important">
                <tr>
                    <td rowspan="4" class=" text-warning align-middle" style="max-width: 230px; width: 230px;">
                        <img class="rounded"
                            src="{{ asset('img/juego/skin0/investigaciones/' . $investigacion->codigo . '.jpg') }}"
                            width="120" height="120">
                    </td>
                    <td colspan="3" class="text-success text-start align-middle">
                        <span class="text-success fw-bold fs-5">{{ __('investigacion.' . $investigacion->codigo) }}</span> <span class="text-light">nivel {{ $investigacion->nivel }}</span>
                        <span class="text-warning">
                            {{ count($investigacion->eninvestigaciones) > 0 ? 'En cola nivel: ' . $investigacion->eninvestigaciones[count($investigacion->eninvestigaciones) - 1]->nivel : '' }}
                        </span>
                    </td>
                    <td colspan="1" class="text-text-light text-end align-middle fw-bold">Termina&nbsp;</td>
                    <td colspan="2" class="text-success text-start align-middle"
                        id="{{ 'termina' . $investigacion->codigo }}"> </td>
                    <td colspan="1" class="text-text-light text-end align-middle fw-bold">Tarda&nbsp;</td>
                    <td colspan="2" class="text-success text-start align-middle"
                        id="{{ 'tiempo' . $investigacion->codigo }}"> </td>
                    <td colspan="1" class="text-success text-right align-middle" style="max-width: 200px; width: 200px;">
                        <div class="input-group input-group-sm">
                            <input id="{{ 'personal' . $investigacion->codigo }}" type="number" class="personal1 form-control input"
                            placeholder="personal" value="{{ number_format(floor($personal), 0, '', '') }}"
                            onkeyup='calculaTiempoInvestigacion(@json($investigacion->coste), @json($velInvest->valor), @json($investigacion->codigo), @json($investigacion->nivel), @json($nivelLaboratorio->nivel))'>
                            <span class="input-group-text bg-dark text-light" style="padding: 0px">
                                <button type="button" class="btn btn-dark btn-sm text-light">
                                    Personal
                                </button>
                            </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td
                        class=" {{ $investigacion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }}">
                        Mineral</td>
                    <td
                        class=" {{ $investigacion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }}">
                        Cristal</td>
                    <td
                        class=" {{ $investigacion->coste->gas == 0 ? 'text-muted' : 'text-warning' }}">
                        Gas</td>
                    <td
                        class=" {{ $investigacion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }}">
                        Plástico</td>
                    <td
                        class=" {{ $investigacion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }}">
                        Cerámica</td>
                    <td
                        class=" {{ $investigacion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }}">
                        Liquido</td>
                    <td
                        class=" {{ $investigacion->coste->micros == 0 ? 'text-muted' : 'text-warning' }}">
                        Micros
                    </td>
                    <td
                        class=" {{ $investigacion->coste->fuel == 0 ? 'text-muted' : 'text-warning' }}">
                        Fuel
                    </td>
                    <td
                        class=" {{ $investigacion->coste->ma == 0 ? 'text-muted' : 'text-warning' }}">
                        M-A</td>
                    <td
                        class=" {{ $investigacion->coste->municion == 0 ? 'text-muted' : 'text-warning' }}">
                        Munición</td>
                </tr>
                <tr>
                    @if ($investigacion->coste->mineral > 0 and $investigacion->coste->mineral > $recursos->mineral)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($investigacion->coste->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->mineral > 0 and $investigacion->coste->mineral < $recursos->
                            mineral)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($investigacion->coste->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->cristal > 0 and $investigacion->coste->cristal > $recursos->cristal)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($investigacion->coste->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->cristal > 0 and $investigacion->coste->cristal < $recursos->
                            cristal)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($investigacion->coste->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->gas > 0 and $investigacion->coste->gas > $recursos->gas)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($investigacion->coste->gas, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->gas > 0 and $investigacion->coste->gas < $recursos->gas)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($investigacion->coste->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->plastico > 0 and $investigacion->coste->plastico > $recursos->plastico)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($investigacion->coste->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->plastico > 0 and $investigacion->coste->plastico < $recursos->
                            plastico)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($investigacion->coste->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica > $recursos->ceramica)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($investigacion->coste->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica < $recursos->
                            ceramica)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($investigacion->coste->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->liquido > 0 and $investigacion->coste->liquido > $recursos->liquido)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($investigacion->coste->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->liquido > 0 and $investigacion->coste->liquido < $recursos->
                            liquido)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($investigacion->coste->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->micros > 0 and $investigacion->coste->micros > $recursos->micros)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($investigacion->coste->micros, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->micros > 0 and $investigacion->coste->micros < $recursos->micros)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($investigacion->coste->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->fuel > 0 and $investigacion->coste->fuel > $recursos->fuel)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($investigacion->coste->fuel, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->fuel > 0 and $investigacion->coste->fuel < $recursos->fuel)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($investigacion->coste->fuel, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->ma > 0 and $investigacion->coste->ma > $recursos->ma)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($investigacion->coste->ma, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ma > 0 and $investigacion->coste->ma < $recursos->ma)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($investigacion->coste->ma, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->municion > 0 and $investigacion->coste->municion > $recursos->municion)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($investigacion->coste->municion, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->municion > 0 and $investigacion->coste->municion < $recursos->municion)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para esta investigación">{{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($investigacion->coste->municion, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                </tr>
                <tr>
                    @if ($investigacion->coste->mineral > 0 and $investigacion->coste->mineral > $recursos->mineral)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($recursos->mineral - $investigacion->coste->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->mineral > 0 and $investigacion->coste->mineral < $recursos->
                            mineral)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->mineral == '' ? $investigacion->coste->mineral : number_format($recursos->mineral - $investigacion->coste->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->cristal > 0 and $investigacion->coste->cristal > $recursos->cristal)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($recursos->cristal - $investigacion->coste->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->cristal > 0 and $investigacion->coste->cristal < $recursos->
                            cristal)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->cristal == '' ? $investigacion->coste->cristal : number_format($recursos->cristal - $investigacion->coste->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->gas > 0 and $investigacion->coste->gas > $recursos->gas)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($recursos->gas - $investigacion->coste->gas, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->gas > 0 and $investigacion->coste->gas < $recursos->gas)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->gas == '' ? $investigacion->coste->gas : number_format($recursos->gas - $investigacion->coste->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->plastico > 0 and $investigacion->coste->plastico > $recursos->plastico)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($recursos->plastico - $investigacion->coste->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->plastico > 0 and $investigacion->coste->plastico < $recursos->
                            plastico)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->plastico == '' ? $investigacion->coste->plastico : number_format($recursos->plastico - $investigacion->coste->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica > $recursos->ceramica)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($recursos->ceramica - $investigacion->coste->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ceramica > 0 and $investigacion->coste->ceramica < $recursos->
                            ceramica)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->ceramica == '' ? $investigacion->coste->ceramica : number_format($recursos->ceramica - $investigacion->coste->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->liquido > 0 and $investigacion->coste->liquido > $recursos->liquido)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($recursos->liquido - $investigacion->coste->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->liquido > 0 and $investigacion->coste->liquido < $recursos->
                            liquido)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->liquido == '' ? $investigacion->coste->liquido : number_format($recursos->liquido - $investigacion->coste->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->micros > 0 and $investigacion->coste->micros > $recursos->micros)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($recursos->micros - $investigacion->coste->micros, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->micros > 0 and $investigacion->coste->micros < $recursos->micros)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->micros == '' ? $investigacion->coste->micros : number_format($recursos->micros - $investigacion->coste->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->fuel > 0 and $investigacion->coste->fuel > $recursos->fuel)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($recursos->fuel - $investigacion->coste->fuel, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->fuel > 0 and $investigacion->coste->fuel < $recursos->fuel)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->fuel == '' ? $investigacion->coste->fuel : number_format($recursos->fuel - $investigacion->coste->fuel, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->ma > 0 and $investigacion->coste->ma > $recursos->ma)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($recursos->ma - $investigacion->coste->ma, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->ma > 0 and $investigacion->coste->ma < $recursos->ma)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->ma == '' ? $investigacion->coste->ma : number_format($recursos->ma - $investigacion->coste->ma, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                    @if ($investigacion->coste->municion > 0 and $investigacion->coste->municion > $recursos->municion)
                        <td class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($recursos->municion - $investigacion->coste->municion, 0, ',', '.') }}
                        </td>
                    @elseif($investigacion->coste->municion > 0 and $investigacion->coste->municion < $recursos->municion)
                            <td class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de investigar">{{ $investigacion->coste->municion == '' ? $investigacion->coste->municion : number_format($recursos->municion - $investigacion->coste->municion, 0, ',', '.') }}
                            </td>
                        @else
                            <td class=" text-light">
                            </td>
                    @endif
                </tr>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo" style="margin-bottom: 5px !important;">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-info col-12" data-bs-toggle="modal"
                            data-bs-target="#datosModal"
                            onclick="mostrarDatosInvestigacion('{{ $investigacion->codigo }}')">
                            <i class="fa fa-info"></i> Información
                        </button>
                    </td>
                    <td>
                        @if ($nivelLaboratorio->nivel > 0)
                            @if ($dependencia->nivelRequiere <= $nivel)
                                @if ($investigacion->nivel >= 99 or $investigacion->coste->mineral > $recursos->mineral or $investigacion->coste->cristal > $recursos->cristal or $investigacion->coste->gas > $recursos->gas or $investigacion->coste->plastico > $recursos->plastico or $investigacion->coste->ceramica > $recursos->ceramica or $investigacion->coste->liquido > $recursos->liquido or $investigacion->coste->micros > $recursos->micros or $investigacion->coste->fuel > $recursos->fuel or $investigacion->coste->ma > $recursos->ma or $investigacion->coste->municion > $recursos->municion || (!empty($colaInvestigacion) && !empty(collect($colaInvestigacion)->where('codigo', $investigacion->codigo)->first())))
                                    <button type="button" class="btn btn-outline-light col-12" disabled
                                        onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}', '{{ $tab }}')">
                                        <i class="fa fa-arrow-alt-circle-up "></i> Investigar
                                    </button>
                                @else
                                    <button type="button" class="btn btn-outline-success col-12"
                                        onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}', '{{ $tab }}')">
                                        <i class="fa fa-arrow-alt-circle-up "></i> Investigar
                                    </button>
                                @endif
                            @else
                                <button type="button" class="btn btn-outline-light col-12" disabled
                                    onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}', '{{ $tab }}')">
                                    <i class="fa fa-arrow-alt-circle-up "></i> Requiere {{ strtolower(trans('investigacion.' .  $dependencia->codigoRequiere)) }} nivel {{$dependencia->nivelRequiere }}
                                </button>
                            @endif
                        @else
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-arrow-alt-circle-up "></i> Requiere {{ strtolower(trans('construccion.laboratorio')) }} nivel 1
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
