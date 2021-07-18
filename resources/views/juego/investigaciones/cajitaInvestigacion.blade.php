{{-- <div class="row rounded cajita">
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
                                @if ($investigacion->nivel >= 99 ||
                                $investigacion->coste->mineral > $recursos->mineral or $investigacion->coste->cristal > $recursos->cristal or $investigacion->coste->gas > $recursos->gas or $investigacion->coste->plastico > $recursos->plastico or $investigacion->coste->ceramica > $recursos->ceramica or $investigacion->coste->liquido > $recursos->liquido or $investigacion->coste->micros > $recursos->micros or $investigacion->coste->fuel > $recursos->fuel or $investigacion->coste->ma > $recursos->ma or $investigacion->coste->municion > $recursos->municion || (!empty($colaInvestigacion) && !empty(collect($colaInvestigacion)->where('codigo', $investigacion->codigo)->first())))
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
</div> --}}

<div class="cajita rounded text-center p-2">
    {{-- CABECERA --}}
    <div class="row align-items-center">
        <div class="col text-success fs-5 fw-bold">
            {{ __('investigacion.' . $investigacion->codigo) }}
            <span class="text-light">
                nivel {{ $investigacion->nivel }}
            </span>
        </div>
        <div class="col">
            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Fecha de finalización si se construye ahora">
                Termina: <span class="text-warning" id="{{ 'termina' . $investigacion->codigo }}"></span>
            </span>
        </div>
        <div class="col">
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tiempo de construcción">
                Tarda <span class="text-danger" id="{{ 'tiempo' . $investigacion->codigo }}"></span>
            </span>
        </div>
        <div class="col">
            <div class="input-group">
                            <input id="{{ 'personal' . $investigacion->codigo }}" type="number" class="personal1 form-control input"
                            placeholder="personal" value="{{ number_format(floor($personal), 0, '', '') }}"
                            onkeyup='calculaTiempoInvestigacion(@json($investigacion->coste), @json($velInvest->valor), @json($investigacion->codigo), @json($investigacion->nivel), @json($nivelLaboratorio->nivel))'>
                <span class="input-group-text bg-dark text-light" style="padding: 0px">
                    <button type="button" class="btn btn-dark btn-sm text-light" disabled>
                        <i class="fas fa-users"></i>
                    </button>
                </span>
            </div>
        </div>
    </div>

    {{-- CUERPO --}}
    <div class="row align-items-center">
        <div class="col d-none d-sm-block">
            <img class="rounded" src="{{ asset('img/juego/skin0/investigaciones/' . $investigacion->codigo . '.jpg') }}"
                width="100" height="100">
        </div>

        <div class="col {{ $investigacion->coste->mineral == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }}">
                    Mineral
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->mineral > 0 && $investigacion->coste->mineral > $recursos->mineral ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->mineral > 0 ? number_format($investigacion->coste->mineral, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->mineral > 0 && $investigacion->coste->mineral > $recursos->mineral ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->mineral > 0 ? number_format($recursos->mineral - $investigacion->coste->mineral, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->cristal == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }}">
                    Cristal
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->cristal > 0 && $investigacion->coste->cristal > $recursos->cristal ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->cristal > 0 ? number_format($investigacion->coste->cristal, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->cristal > 0 && $investigacion->coste->cristal > $recursos->cristal ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->cristal > 0 ? number_format($recursos->cristal - $investigacion->coste->cristal, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->gas == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->gas == 0 ? 'text-muted' : 'text-warning' }}">
                    Gas
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->gas > 0 && $investigacion->coste->gas > $recursos->gas ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->gas > 0 ? number_format($investigacion->coste->gas, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->gas > 0 && $investigacion->coste->gas > $recursos->gas ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->gas > 0 ? number_format($recursos->gas - $investigacion->coste->gas, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->plastico == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }}">
                    Plastico
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->plastico > 0 && $investigacion->coste->plastico > $recursos->plastico ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->plastico > 0 ? number_format($investigacion->coste->plastico, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->plastico > 0 && $investigacion->coste->plastico > $recursos->plastico ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->plastico > 0 ? number_format($recursos->plastico - $investigacion->coste->plastico, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->ceramica == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }}">
                    Ceramica
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->ceramica > 0 && $investigacion->coste->ceramica > $recursos->ceramica ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->ceramica > 0 ? number_format($investigacion->coste->ceramica, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->ceramica > 0 && $investigacion->coste->ceramica > $recursos->ceramica ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->ceramica > 0 ? number_format($recursos->ceramica - $investigacion->coste->ceramica, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->liquido == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }}">
                    Liquido
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->liquido > 0 && $investigacion->coste->liquido > $recursos->liquido ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->liquido > 0 ? number_format($investigacion->coste->liquido, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->liquido > 0 && $investigacion->coste->liquido > $recursos->liquido ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->liquido > 0 ? number_format($recursos->liquido - $investigacion->coste->liquido, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->micros == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->micros == 0 ? 'text-muted' : 'text-warning' }}">
                    Micros
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->micros > 0 && $investigacion->coste->micros > $recursos->micros ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->micros > 0 ? number_format($investigacion->coste->micros, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->micros > 0 && $investigacion->coste->micros > $recursos->micros ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->micros > 0 ? number_format($recursos->micros - $investigacion->coste->micros, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->fuel == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->fuel == 0 ? 'text-muted' : 'text-warning' }}">
                    Fuel
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->fuel > 0 && $investigacion->coste->fuel > $recursos->fuel ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->fuel > 0 ? number_format($investigacion->coste->fuel, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->fuel > 0 && $investigacion->coste->fuel > $recursos->fuel ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->fuel > 0 ? number_format($recursos->fuel - $investigacion->coste->fuel, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->ma == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->ma == 0 ? 'text-muted' : 'text-warning' }}">
                    MA
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->ma > 0 && $investigacion->coste->ma > $recursos->ma ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->ma > 0 ? number_format($investigacion->coste->ma, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->ma > 0 && $investigacion->coste->ma > $recursos->ma ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->ma > 0 ? number_format($recursos->ma - $investigacion->coste->ma, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $investigacion->coste->municion == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $investigacion->coste->municion == 0 ? 'text-muted' : 'text-warning' }}">
                    Munición
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->municion > 0 && $investigacion->coste->municion > $recursos->municion ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $investigacion->coste->municion > 0 ? number_format($investigacion->coste->municion, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $investigacion->coste->municion > 0 && $investigacion->coste->municion > $recursos->municion ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $investigacion->coste->municion > 0 ? number_format($recursos->municion - $investigacion->coste->municion, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTONERA --}}
    <div class="row align-items-center">
        <div class="col">
            <button type="button" class="btn btn-outline-info col-12" data-bs-toggle="modal"
                data-bs-target="#datosModal"
                onclick="mostrarDatosInvestigacion('{{ $investigacion->codigo }}')">
                <i class="fa fa-info"></i> Información
            </button>
        </div>

        <div class="col">
            @if ($nivelLaboratorio->nivel > 0)
                @if ($dependencia->nivelRequiere <= $nivel)
                    @if (
                        $investigacion->nivel >= 99 ||
                        $investigacion->coste->mineral > $recursos->mineral ||
                        $investigacion->coste->cristal > $recursos->cristal ||
                        $investigacion->coste->gas > $recursos->gas ||
                        $investigacion->coste->plastico > $recursos->plastico ||
                        $investigacion->coste->ceramica > $recursos->ceramica ||
                        $investigacion->coste->liquido > $recursos->liquido ||
                        $investigacion->coste->micros > $recursos->micros ||
                        $investigacion->coste->fuel > $recursos->fuel ||
                        $investigacion->coste->ma > $recursos->ma ||
                        $investigacion->coste->municion > $recursos->municion ||
                        (!empty($colaInvestigacion) &&
                        !empty(collect($colaInvestigacion)->where('codigo', $investigacion->codigo)->first()))
                    )
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
        </div>
    </div>
</div>

<script>
    calculaTiempoInvestigacion(@json($investigacion->coste), @json($velInvest->valor), @json($investigacion->
        codigo), @json($investigacion->nivel), @json($nivelLaboratorio->nivel));

    // Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

</script>
