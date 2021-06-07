<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-sm table-dark table-borderless text-center overflow-auto" style="--bs-table-bg: transparent !important; margin-bottom: 0px !important;">
                <tr>
                    <td rowspan="4" class=" text-warning align-middle" style="max-width: 230px; width: 230px;">
                        <img class="img-fluid"
                            src="{{ asset('img/fotos naves/skin' . $disenio->skin . '/nave' . $disenio->fuselajes_id . '.png') }}">
                    </td>
                    <td colspan="2" class="text-success text-center align-middle">
                        <span class="fw-bold fs-5">{{ $disenio->nombre }}</span>
                    </td>
                    <td colspan="2" class="text-success text-center align-middle">
                        <span class="">Modelo: {{ ucfirst(strtolower($disenio->fuselajes->codigo)) }}</span>
                    </td>
                    <td colspan="2" class="text-success text-center align-middle">
                        <span class="">Tamaño: {{ $disenio->fuselajes->tamanio }}</span>
                    </td>
                    <td colspan="2" class="text-success text-center align-middle">
                        <span class="">Creador: {{ $disenio->creador->nombre }}</span>
                    </td>
                    <td colspan="1" class="text-success text-center align-middle">
                        <span class="fw-bold">Cantidad:
                            {{ !empty($planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()) ? number_format($planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()->cantidad, 0, ',', '.') : 0 }}</span>
                    </td>
                </tr>
                <tr>
                    <td class=" text-warning">
                        Mineral
                    </td>
                    <td class=" text-warning">
                        Cristal
                    </td>
                    <td class=" text-warning">
                        Gas
                    </td>
                    <td class=" text-warning">
                        Plastico
                    </td>
                    <td class=" text-warning">
                        Cerámica
                    </td>
                    <td class=" text-warning">
                        Liquido
                    </td>
                    <td class=" text-warning">
                        Micros
                    </td>
                    <td class=" text-warning">
                        Personal
                    </td>
                    <td class=" text-warning">
                        Tiempo
                    </td>
                </tr>
                <tr>
                    @if ($disenio->costes->mineral > 0 and $disenio->costes->mineral > $recursos->mineral)
                        <td id="mineral{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($disenio->costes->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->mineral > 0 and $disenio->costes->mineral < $recursos->
                            mineral)
                            <td id="mineral{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($disenio->costes->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="mineral{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->cristal > 0 and $disenio->costes->cristal > $recursos->cristal)
                        <td id="cristal{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($disenio->costes->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->cristal > 0 and $disenio->costes->cristal < $recursos->
                            cristal)
                            <td id="cristal{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($disenio->costes->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="cristal{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->gas > 0 and $disenio->costes->gas > $recursos->gas)
                        <td id="gas{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($disenio->costes->gas, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->gas > 0 and $disenio->costes->gas < $recursos->gas)
                            <td id="gas{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($disenio->costes->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="gas{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->plastico > 0 and $disenio->costes->plastico > $recursos->plastico)
                        <td id="plastico{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($disenio->costes->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->plastico > 0 and $disenio->costes->plastico < $recursos->
                            plastico)
                            <td id="plastico{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($disenio->costes->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="plastico{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->ceramica > 0 and $disenio->costes->ceramica > $recursos->ceramica)
                        <td id="ceramica{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($disenio->costes->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->ceramica > 0 and $disenio->costes->ceramica < $recursos->
                            ceramica)
                            <td id="ceramica{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($disenio->costes->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="ceramica{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->liquido > 0 and $disenio->costes->liquido > $recursos->liquido)
                        <td id="liquido{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($disenio->costes->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->liquido > 0 and $disenio->costes->liquido < $recursos->
                            liquido)
                            <td id="liquido{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($disenio->costes->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="liquido{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->micros > 0 and $disenio->costes->micros > $recursos->micros)
                        <td id="micros{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($disenio->costes->micros, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->micros > 0 and $disenio->costes->micros < $recursos->micros)
                            <td id="micros{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($disenio->costes->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="micros{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->personal > 0 and $disenio->costes->personal > $recursos->personal)
                        <td id="personal{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($disenio->costes->personal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->personal > 0 and $disenio->costes->personal < $recursos->personal)
                            <td id="personal{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos necesario para producir esta nave">{{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($disenio->costes->personal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="personal{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    <td id="tiempo{{ $disenio->id }}" class=" text-light">
                        {{ round($disenio->mejoras->tiempo / (1 + ($constanteVelocidad * $nivelHangar) / 100) / 3600) }}:{{ gmdate('i:s', round($disenio->mejoras->tiempo / (1 + ($constanteVelocidad * $nivelHangar) / 100))) }}
                    </td>
                </tr>
                <tr>
                    @if ($disenio->costes->mineral > 0 and $disenio->costes->mineral > $recursos->mineral)
                        <td id="restantemineral{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($recursos->mineral - $disenio->costes->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->mineral > 0 and $disenio->costes->mineral < $recursos->
                            mineral)
                            <td id="restantemineral{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($recursos->mineral - $disenio->costes->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantemineral{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->cristal > 0 and $disenio->costes->cristal > $recursos->cristal)
                        <td id="restantecristal{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($recursos->cristal - $disenio->costes->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->cristal > 0 and $disenio->costes->cristal < $recursos->
                            cristal)
                            <td id="restantecristal{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($recursos->cristal - $disenio->costes->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantecristal{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->gas > 0 and $disenio->costes->gas > $recursos->gas)
                        <td id="restantegas{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($recursos->gas - $disenio->costes->gas, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->gas > 0 and $disenio->costes->gas < $recursos->gas)
                            <td id="restantegas{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($recursos->gas - $disenio->costes->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantegas{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->plastico > 0 and $disenio->costes->plastico > $recursos->plastico)
                        <td id="restanteplastico{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($recursos->plastico - $disenio->costes->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->plastico > 0 and $disenio->costes->plastico < $recursos->
                            plastico)
                            <td id="restanteplastico{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($recursos->plastico - $disenio->costes->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restanteplastico{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->ceramica > 0 and $disenio->costes->ceramica > $recursos->ceramica)
                        <td id="restanteceramica{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($recursos->ceramica - $disenio->costes->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->ceramica > 0 and $disenio->costes->ceramica < $recursos->
                            ceramica)
                            <td id="restanteceramica{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($recursos->ceramica - $disenio->costes->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restanteceramica{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->liquido > 0 and $disenio->costes->liquido > $recursos->liquido)
                        <td id="restanteliquido{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($recursos->liquido - $disenio->costes->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->liquido > 0 and $disenio->costes->liquido < $recursos->
                            liquido)
                            <td id="restanteliquido{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($recursos->liquido - $disenio->costes->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restanteliquido{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->micros > 0 and $disenio->costes->micros > $recursos->micros)
                        <td id="restantemicros{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($recursos->micros - $disenio->costes->micros, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->micros > 0 and $disenio->costes->micros < $recursos->micros)
                            <td id="restantemicros{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($recursos->micros - $disenio->costes->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantemicros{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                    @if ($disenio->costes->personal > 0 and $disenio->costes->personal > $recursos->personal)
                        <td id="restantepersonal{{ $disenio->id }}" class=" text-danger">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($recursos->personal - $disenio->costes->personal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->personal > 0 and $disenio->costes->personal < $recursos->personal)
                            <td id="restantepersonal{{ $disenio->id }}" class=" text-light">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">{{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($recursos->personal - $disenio->costes->personal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantepersonal{{ $disenio->id }}" class=" text-light">
                            </td>
                    @endif
                </tr>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo align-middle" style="margin-bottom: 5px !important;">
                <tr>
                    <td>
                        @if ($nivelHangar < 1 || empty($planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()) || $planetaActual->estacionadas->where('disenios_id', $disenio->id)->first()->cantidad == 0)
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-recycle"></i> Reciclar nave
                            </button>
                        @else
                            <button type="button" class="btn btn-danger col-12"
                                onclick="reciclarDisenio({{ $disenio->id }})">
                                <i class="fa fa-recycle"></i> Reciclar nave
                            </button>
                        @endif
                    </td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text bg-dark text-light">
                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                    onclick='resetCantidad(@json($disenio->costes), @json($disenio->id))'>
                                    1
                                </button>
                            </span>
                            <input type="number" class="form-control input" value="1" aria-label=""
                                aria-describedby="basic-addon2" id="disenio{{ $disenio->id }}" min="1"
                                onkeyup='recalculaCostos(@json($disenio->id), @json($disenio->costes))'
                                onchange='recalculaCostos(@json($disenio->id), @json($disenio->costes))'>
                            <span class="input-group-text bg-dark text-light">
                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                    onclick='calculaMaximo(@json($disenio->costes), @json($disenio->id))'>
                                    M
                                </button>
                            </span>
                        </div>
                    </td>
                    <td>
                        @if ($nivelHangar < 1 || $disenio->costes->mineral > $recursos->mineral || $disenio->costes->cristal > $recursos->cristal || $disenio->costes->gas > $recursos->gas || $disenio->costes->plastico > $recursos->plastico || $disenio->costes->ceramica > $recursos->ceramica || $disenio->costes->liquidos > $recursos->liquidos || $disenio->costes->micros > $recursos->micros || $disenio->costes->personal > $recursos->personal || empty(Auth::user()->jugador->disenios->where('id', $disenio->id)->first()))
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-plus"></i> Construir nave
                            </button>
                        @else
                            <button type="button" class="btn btn-success col-12"
                                onclick="construirDisenio({{ $disenio->id }})" id="disenioConstruir{{ $disenio->id }}">
                                <i class="fa fa-plus"></i> Construir nave
                            </button>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>
                        @if (empty(Auth::user()->jugador->disenios->where('id', $disenio->id)->first()))
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-eraser "></i> Diseño borrado
                            </button>
                        @else
                            <a type="button" class="btn btn-outline-danger col-12 text-danger"
                                href="{{ url('juego/disenio/borrarDisenio/' . $disenio->id) }}">
                                <i class="fa fa-eraser "></i> Borrar diseño
                            </a>
                        @endif
                    </td>
                    <td>
                        <div class="accordion accordion-flush" id="button{{ $disenio->id }}">
                            <div class="accordion-item bg-transparent">
                                <h2 class="accordion-header" id="flush-headingOne" style="margin-bottom: 5px;">
                                    <a class="btn btn-outline-info col-12" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#info{{ $disenio->id }}"
                                        aria-expanded="false" aria-controls="info{{ $disenio->id }}"
                                        onclick="MostrarResultadoDisenio({{ $disenio }})">
                                        <i class="fa fa-info"></i> Información
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </td>
                    <td>
                        @if (empty(Auth::user()->jugador->disenios->where('id', $disenio->id)->first()))
                            <button type="button" class="btn btn-outline-light col-12" disabled>
                                <i class="fa fa-edit "></i> Diseño borrado
                            </button>
                        @else
                            <a type="button" class="btn btn-outline-success col-12 text-success"
                                href="{{ url('juego/disenio/editarDisenio/' . $disenio->id) }}">
                                <i class="fa fa-edit "></i> Editar disenio
                            </a>
                        @endif
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <div id="info{{ $disenio->id }}" class="accordion-collapse collapse"
                aria-labelledby="info{{ $disenio->id }}" data-bs-parent="#button{{ $disenio->id }}">
                <div class="">
                    <table class="table table-sm table-borderless text-center align-middle">
                        <tr>
                            <td class="text-warning">Carga</td>
                            <td class="text-warning">Recoleccion</td>
                            <td class="text-warning">Extracción</td>
                            <td class="text-warning">Hangar cazas</td>
                            <td class="text-warning">Hangar ligeras</td>
                            <td class="text-warning">Hangar medias</td>
                            <td class="text-warning">Hangar pesadas</td>
                        </tr>
                        <tr>
                            <td class="text-light" id="carga{{ $disenio->id }}">0</td>
                            <td class="text-light" id="recoleccion{{ $disenio->id }}">0</td>
                            <td class="text-light" id="extraccion{{ $disenio->id }}">0</td>
                            <td class="text-light" id="hangarCazas{{ $disenio->id }}">0</td>
                            <td class="text-light" id="hangarLigeras{{ $disenio->id }}">0</td>
                            <td class="text-light" id="hangarMedias{{ $disenio->id }}">0</td>
                            <td class="text-light" id="hangarPesadas{{ $disenio->id }}">0</td>
                        </tr>
                        <tr>
                            <td class="text-warning">Mantenimiento</td>
                            <td class="text-warning">Munición</td>
                            <td class="text-warning">Fuel</td>
                            <td class="text-warning">Vel. Impulso</td>
                            <td class="text-warning">Hypervelocidad</td>
                            <td class="text-warning">Ataque</td>
                            <td class="text-warning">Defensa</td>
                        </tr>
                        <tr>
                            <td class="text-light" id="mantenimiento{{ $disenio->id }}">0</td>
                            <td class="text-light" id="municion{{ $disenio->id }}">0</td>
                            <td class="text-light" id="fuel{{ $disenio->id }}">0</td>
                            <td class="text-light" id="maniobra{{ $disenio->id }}">0</td>
                            <td class="text-light" id="velocidad{{ $disenio->id }}">0</td>
                            <td class="text-light" id="ataque{{ $disenio->id }}">0</td>
                            <td class="text-light" id="defensa{{ $disenio->id }}">0</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
