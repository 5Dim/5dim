<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <th colspan="3" class="text-success text-center borderless align-middle">
                        <big>Creador: {{ $disenio->creador->nombre }}<big>
                    </th>
                    <th colspan="2" class="text-success text-center borderless align-middle">
                        <big>Tamaño: {{ $disenio->fuselajes->tamanio }}<big>
                    </th>
                    <th colspan="2" class="text-success text-center borderless align-middle">
                        <big>Modelo: {{ $disenio->nombre }}<big>
                    </th>
                    <th colspan="3" class="text-success text-center borderless align-middle">
                        <big>Cantidad:
                            {{ empty($disenio->estacionadas->cantidad) ? '0' : number_format($disenio->estacionadas->cantidad, 0, ',', '.') }}<big>
                    </th>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning borderless">
                        <img class="rounded"
                            src="{{ asset('img/fotos naves/skin'.$disenio->skin.'/naveMT' . $disenio->fuselajes_id . '.jpg') }}"
                            width="180" height="119">
                    </td>
                    <td colspan="7" class="borderless"></td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Mineral
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Cristal
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Gas
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Plastico
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Cerámica
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Liquido
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Micros
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Personal
                    </td>
                    <td class="anchofijo text-warning borderless">
                        Tiempo
                    </td>
                </tr>
                <tr>
                    @if ($disenio->costes->mineral > 0 and $disenio->costes->mineral > $recursos->mineral)
                        <td id="mineral{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($disenio->costes->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->mineral > 0 and $disenio->costes->mineral < $recursos->
                            mineral)
                            <td id="mineral{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($disenio->costes->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="mineral{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->cristal > 0 and $disenio->costes->cristal > $recursos->cristal)
                        <td id="cristal{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($disenio->costes->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->cristal > 0 and $disenio->costes->cristal < $recursos->
                            cristal)
                            <td id="cristal{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($disenio->costes->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="cristal{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->gas > 0 and $disenio->costes->gas > $recursos->gas)
                        <td id="gas{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($disenio->costes->gas, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->gas > 0 and $disenio->costes->gas < $recursos->gas)
                            <td id="gas{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($disenio->costes->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="gas{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->plastico > 0 and $disenio->costes->plastico > $recursos->plastico)
                        <td id="plastico{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($disenio->costes->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->plastico > 0 and $disenio->costes->plastico < $recursos->
                            plastico)
                            <td id="plastico{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($disenio->costes->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="plastico{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->ceramica > 0 and $disenio->costes->ceramica > $recursos->ceramica)
                        <td id="ceramica{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($disenio->costes->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->ceramica > 0 and $disenio->costes->ceramica < $recursos->
                            ceramica)
                            <td id="ceramica{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($disenio->costes->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="ceramica{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->liquido > 0 and $disenio->costes->liquido > $recursos->liquido)
                        <td id="liquido{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($disenio->costes->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->liquido > 0 and $disenio->costes->liquido < $recursos->
                            liquido)
                            <td id="liquido{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($disenio->costes->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="liquido{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->micros > 0 and $disenio->costes->micros > $recursos->micros)
                        <td id="micros{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($disenio->costes->micros, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->micros > 0 and $disenio->costes->micros < $recursos->micros)
                            <td id="micros{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($disenio->costes->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="micros{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->personal > 0 and $disenio->costes->personal > $recursos->personal)
                        <td id="personal{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($disenio->costes->personal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->personal > 0 and $disenio->costes->personal < $recursos->personal)
                            <td id="personal{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($disenio->costes->personal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="personal{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    <td id="tiempo{{ $disenio->id }}" class="anchofijo text-light borderless">
                        {{round(($disenio->mejoras->tiempo /(1+($constanteVelocidad * $nivelHangar/100)))/3600)}}:{{gmdate('i:s',round($disenio->mejoras->tiempo /(1+($constanteVelocidad * $nivelHangar/100)))) }}
                    </td>
                </tr>
                <tr>
                    @if ($disenio->costes->mineral > 0 and $disenio->costes->mineral > $recursos->mineral)
                        <td id="restantemineral{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($recursos->mineral - $disenio->costes->mineral, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->mineral > 0 and $disenio->costes->mineral < $recursos->
                            mineral)
                            <td id="restantemineral{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->mineral == '' ? $disenio->costes->mineral : number_format($recursos->mineral - $disenio->costes->mineral, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantemineral{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->cristal > 0 and $disenio->costes->cristal > $recursos->cristal)
                        <td id="restantecristal{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($recursos->cristal - $disenio->costes->cristal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->cristal > 0 and $disenio->costes->cristal < $recursos->
                            cristal)
                            <td id="restantecristal{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->cristal == '' ? $disenio->costes->cristal : number_format($recursos->cristal - $disenio->costes->cristal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantecristal{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->gas > 0 and $disenio->costes->gas > $recursos->gas)
                        <td id="restantegas{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($recursos->gas - $disenio->costes->gas, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->gas > 0 and $disenio->costes->gas < $recursos->gas)
                            <td id="restantegas{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->gas == '' ? $disenio->costes->gas : number_format($recursos->gas - $disenio->costes->gas, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantegas{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->plastico > 0 and $disenio->costes->plastico > $recursos->plastico)
                        <td id="restanteplastico{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($recursos->plastico - $disenio->costes->plastico, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->plastico > 0 and $disenio->costes->plastico < $recursos->
                            plastico)
                            <td id="restanteplastico{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->plastico == '' ? $disenio->costes->plastico : number_format($recursos->plastico - $disenio->costes->plastico, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restanteplastico{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->ceramica > 0 and $disenio->costes->ceramica > $recursos->ceramica)
                        <td id="restanteceramica{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($recursos->ceramica - $disenio->costes->ceramica, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->ceramica > 0 and $disenio->costes->ceramica < $recursos->
                            ceramica)
                            <td id="restanteceramica{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->ceramica == '' ? $disenio->costes->ceramica : number_format($recursos->ceramica - $disenio->costes->ceramica, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restanteceramica{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->liquido > 0 and $disenio->costes->liquido > $recursos->liquido)
                        <td id="restanteliquido{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($recursos->liquido - $disenio->costes->liquido, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->liquido > 0 and $disenio->costes->liquido < $recursos->
                            liquido)
                            <td id="restanteliquido{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->liquido == '' ? $disenio->costes->liquido : number_format($recursos->liquido - $disenio->costes->liquido, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restanteliquido{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->micros > 0 and $disenio->costes->micros > $recursos->micros)
                        <td id="restantemicros{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($recursos->micros - $disenio->costes->micros, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->micros > 0 and $disenio->costes->micros < $recursos->micros)
                            <td id="restantemicros{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->micros == '' ? $disenio->costes->micros : number_format($recursos->micros - $disenio->costes->micros, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantemicros{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                    @if ($disenio->costes->personal > 0 and $disenio->costes->personal > $recursos->personal)
                        <td id="restantepersonal{{ $disenio->id }}" class="anchofijo text-danger borderless">
                            {{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($recursos->personal - $disenio->costes->personal, 0, ',', '.') }}
                        </td>
                    @elseif($disenio->costes->personal > 0 and $disenio->costes->personal < $recursos->personal)
                            <td id="restantepersonal{{ $disenio->id }}" class="anchofijo text-light borderless">
                                {{ $disenio->costes->personal == '' ? $disenio->costes->personal : number_format($recursos->personal - $disenio->costes->personal, 0, ',', '.') }}
                            </td>
                        @else
                            <td id="restantepersonal{{ $disenio->id }}" class="anchofijo text-light borderless">
                            </td>
                    @endif
                </tr>
            </table>
        </div>
    </div>
    <div class="col-12">
        <div id="cuadro1" class="table-responsive ">
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        <button type="button" class="btn btn-outline-danger col-12"
                            onclick="reciclarDisenio({{ $disenio->id }})">
                            <i class="fa fa-info-circle"></i> Reciclar nave
                        </button>
                    </td>
                    <td>
                        <div class="input-group mb-3 input-group-sm borderless">
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">
                                    <button type="button" class="btn btn-dark text-warning"
                                        onclick='resetCantidad(@json($disenio->id))'>
                                        1
                                    </button>
                                </span>
                            </div>
                            <input type="text" class="form-control input" value="1" aria-label=""
                                aria-describedby="basic-addon2" id="disenio{{ $disenio->id }}"
                                onkeyup='recalculaCostos(@json($disenio->id), @json($disenio->costes))'>
                            <div class="input-group-append">
                                <span class="input-group-text bg-dark text-light">
                                    <button type="button" class="btn btn-dark text-warning"
                                        onclick='calculaMaximo(@json($disenio->costes), @json($disenio->id))'>
                                        M
                                    </button>
                                </span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-success col-12"
                            onclick="construirDisenio({{ $disenio->id }})">
                            <i class="fa fa-plus-circle"></i> Construir
                        </button>
                    </td>
                </tr>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <td>
                        <a type="button" class="btn btn-outline-danger col-12 text-danger"
                            href="{{ url('juego/disenio/borrarDisenio/' . $disenio->id) }}">
                            <i class="fa fa-times "></i> Borrar diseño
                        </a>
                    </td>
                    <td>
                        <div class="accordion accordion-flush" id="button{{ $disenio->id }}">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <a class="btn btn-outline-primary col-12 text-primary" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#info{{ $disenio->id }}"
                                        aria-expanded="false" aria-controls="info{{ $disenio->id }}"  onclick="MostrarResultadoDisenio({{$disenio}})">
                                        Datos
                                    </a>
                                </h2>
                            </div>
                        </div>
                    </td>
                    <td>
                        <a type="button" class="btn btn-outline-success col-12 text-success"
                            href="{{ url('juego/disenio/editarDisenio/' . $disenio->id) }}">
                            <i class="fa fa-edit"></i> Editar disenio
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div>
            <div id="info{{ $disenio->id }}" class="accordion-collapse collapse"
                aria-labelledby="info{{ $disenio->id }}" data-bs-parent="#button{{ $disenio->id }}">
                <div class="">
                    <table class="table table-sm table-borderless text-center anchofijo">
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
