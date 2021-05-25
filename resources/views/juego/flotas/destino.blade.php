<div id="cajitaDestino{{ $numero }}" class="col-12 cajita-success rounded">
    <div id="cuadro1" class="table-responsive">
        <table class="table table-dark table-borderless text-center"
            style="--bs-table-bg: transparent !important">
            <tr>
                <th colspan="9" class="text-success">
                    <big id="titulo{{ $numero }}">
                        Destino {{ $numero }}
                    </big>
                </th>
            </tr>
            <tr class="ocultarenorigen{{ $numero }}">
                <th rowspan="2" class="align-middle">
                    <img id="imagenDestino{{ $numero }}" class="rounded"
                        src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="120" height="120">
                </th>
                <th class="text-warning align-middle ">
                    Planetas
                </th>
                <th class="text-warning align-middle">
                    Sistema solar
                </th>
                <th class="text-warning align-middle">
                    Planeta
                </th>
                <th class="text-warning align-middle ">
                    Misión
                </th>
                <th class="text-warning align-middle ">
                    Porcentaje de velocidad
                </th>
                <th id="tipovelocidad{{ $numero }}" class="text-warning align-middle  ">
                    Hypervelocidad
                </th>
                <th id="consumofuel{{ $numero }}" class="text-warning align-middle  ">
                    Consumo de fuel
                </th>
                <th class="text-warning align-middle  ">
                    Tiempo de viaje
                </th>
            </tr>
            <tr class="ocultarenorigen{{ $numero }}">
                <td class="text-light">
                    <div id="selectorPlaneta{{ $numero }}">
                        <select id="listaPlanetas{{ $numero }}" class="form-control ediciondestino">
                            <option value="none">Selecciona un planeta</option>
                            <optgroup label="Planetas propios">
                                @foreach ($planetasJugador as $planeta)
                                    <option value="{{ $planeta->estrella }}x{{ $planeta->orbita }}">
                                        {{ $planeta->nombre }}
                                        ({{ $planeta->estrella }}x{{ $planeta->orbita }})
                                    </option>
                                @endforeach
                            </optgroup>
                            @if (!empty($flotasEnOrbitaPropias[0]))
                                <optgroup label="Flotas orbitando propias">
                                    @foreach ($flotasEnOrbitaPropias as $flota)
                                        <option value="{{ $flota->publico }}">
                                            {{ $flota->nombre }} ({{ $flota->publico }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                            @if (!empty($flotasEnRecoleccionPropias[0]))
                                <optgroup label="Flotas en recoleccion propias">
                                    @foreach ($flotasEnRecoleccionPropias as $flota)
                                        <option value="{{ $flota->publico }}">
                                            {{ $flota->nombre }} ({{ $flota->publico }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                            @if (!empty($planetasAlianza))
                                <optgroup label="Planetas de alianza">
                                    @foreach ($planetasAlianza as $planeta)
                                        <option value="{{ $planeta->estrella }}x{{ $planeta->orbita }}">
                                            {{ $planeta->nombre }}
                                            ({{ $planeta->estrella }}x{{ $planeta->orbita }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                            @if (!empty($flotasEnOrbitaAlianza))
                                <optgroup label="Flotas orbitando de alianza">
                                    @foreach ($flotasEnOrbitaAlianza as $flota)
                                        <option value="{{ $flota->publico }}">
                                            {{ $flota->nombre }} ({{ $flota->publico }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                            @if (!empty($flotasEnRecoleccionAlianza))
                                <optgroup label="Flotas en recoleccion de alianza">
                                    @foreach ($flotasEnRecoleccionAlianza as $flota)
                                        <option value="{{ $flota->publico }}">
                                            {{ $flota->nombre }} ({{ $flota->publico }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endif
                        </select>
                    </div>
                </td>
                <td class="text-light">
                    <input id="sistemaDest{{ $numero }}" type="text" class="form-control input ediciondestino"
                        placeholder="Numero de sistema" value="">
                </td>
                <td class="text-light">
                    <input id="planetaDest{{ $numero }}" type="text" class="form-control input ediciondestino"
                        type="number" pattern="[0-9]{1}" placeholder="Numero de orbita" value="">
                </td>
                <td class="text-light">
                    <div id="selectorordenDest{{ $numero }}">
                        <select name="orden" id="ordenDest{{ $numero }}"
                            class="select form-control ediciondestino">
                            <option value="" selected>Sin misión</option>
                            <option value="Transportar">Transportar</option>
                            <option value="Transferir">Transferir</option>
                            <option value="Orbitar">Orbitar</option>
                            <option value="Recolectar">Recolectar</option>
                            <option value="Extraer">Extraer</option>
                            <option value="Reciclar">Reciclar</option>
                            <option value="Colonizar">Colonizar</option>
                        </select>
                    </div>
                </td>
                <td class="text-light">
                    <div id="selectorporcentVDest{{ $numero }}" class="input-group mb-3 borderless"
                        style="padding-left: 10px !important; padding-right: 5px !important">
                        <input id="porcentVDest{{ $numero }}" type="text"
                            class="form-control input ediciondestino" value="100" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div id="porcentsimbol" class="input-group-append">
                            <span class="input-group-text bg-dark text-light">%</span>
                        </div>
                    </div>
                </td>
                <td id="velocidadDest{{ $numero }}" class="text-light ocultarenorigen{{ $numero }}">
                    -
                </td>
                <td id="fuelDest{{ $numero }}" class="text-light ocultarenorigen{{ $numero }}">
                    -
                </td>
                <td id="tiempoDest{{ $numero }}" class="text-light ocultarenorigen{{ $numero }}">
                    --
                </td>
            </tr>
        </table>
        <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
            <tr>
                <td class="anchofijo text-warning">
                    Recursos
                </td>
                <td class="anchofijo text-warning">
                    Personal
                </td>
                <td class="anchofijo text-warning">
                    Mineral
                </td>
                <td class="anchofijo text-warning">
                    cristal
                </td>
                <td class="anchofijo text-warning">
                    Gas
                </td>
                <td class="anchofijo text-warning">
                    Plástico
                </td>
                <td class="anchofijo text-warning">
                    Cerámica
                </td>
                <td class="anchofijo text-warning">
                    Liquido
                </td>
                <td class="anchofijo text-warning">
                    Micros
                </td>
                <td class="anchofijo text-warning">
                    Fuel
                </td>
                <td class="anchofijo text-warning">
                    M-A
                </td>
                <td class="anchofijo text-warning">
                    Munición
                </td>
                <td class="anchofijo text-warning">
                    Creditos
                </td>
            </tr>
            <tr>
                <td class="anchofijo">
                    <button id="botontienes{{ $numero }}" type="button"
                        class="btn btn-dark col-12 btn-sm text-warning" onclick="TodoDeOrigen({{ $numero }})">
                        Tienes
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonpersonal{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'personal')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonmineral{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'mineral')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botoncristal{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'cristal')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botongas{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'gas')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonplastico{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'plastico')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonceramica{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'ceramica')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonliquido{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'liquido')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonmicros{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'micros')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonfuel{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'fuel')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonma{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'ma')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botonmunicion{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'municion')">
                        0
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button id="botoncreditos{{ $numero }}" type="button" class="btn btn-dark col-12 btn-sm"
                        onclick="CargarRecurso({{ $numero }},'creditos')">
                        0
                    </button>
                </td>
            </tr>
            <tr id="envias{{ $numero }}" class="">
                <td class="anchofijo">
                    <button id="botonenvias{{ $numero }}" type="button"
                        class="btn btn-dark col-12 btn-sm text-warning" onclick="Vaciar({{ $numero }})">
                        Enviar
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <input id="personal{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="mineral{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="cristal{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="gas{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="plastico{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="ceramica{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="liquido{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="micros{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="fuel{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="ma{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="municion{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input id="creditos{{ $numero }}" type="text"
                        class="form-control input form-control-sm enviarRecursos{{ $numero }}" value="0" min="0"
                        max="125248">
                </td>
            </tr>

            <tr id="listaPrioridades{{ $numero }}" class="">
                <td class="anchofijo">
                    <button id="botonprioridades{{ $numero }}" type="button"
                        class="btn btn-dark col-12 btn-sm text-warning"
                        onclick="VaciarPrioridades({{ $numero }})">
                        Prioridades
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadpersonal{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadmineral{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadcristal{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadgas{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadplastico{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadceramica{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadliquido{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadmicros{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadfuel{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadma{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadmunicion{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
                <td class="anchofijo text-light">
                    <input id="prioridadcreditos{{ $numero }}" type="text"
                        class="form-control input form-control-sm prioridad prioridadRecursos{{ $numero }}"
                        value="0" min="0" max="15">
                </td>
            </tr>
        </table>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#listaPlanetas{{ $numero }}').select2({
            placeholder: "Nombre del planeta",
            width: '100%',
            language: "es"
        });

        RecursosSiDestino({{ $numero }});

        $('#sistemaDest{{ $numero }}').focusout(function() {
            Calculoespacitiempo();
        });

        $('#planetaDest{{ $numero }}').keyup(function() {
            if ($('#planetaDest{{ $numero }}').val() != undefined) {
                if ($('#planetaDest{{ $numero }}').val() * 1 > 9) {
                    $('#planetaDest{{ $numero }}').val("9");
                }
                if ($('#planetaDest{{ $numero }}').val() * 1 < 1) {
                    $('#planetaDest{{ $numero }}').val("1");
                }
            }
            Calculoespacitiempo();
        });

        $('#porcentVDest{{ $numero }}').keyup(function() {
            if ($('#porcentVDest{{ $numero }}').val() * 1 > 100) {
                $('#porcentVDest{{ $numero }}').val("100");
            }
            if ($('#porcentVDest{{ $numero }}').val() * 1 < 1) {
                $('#porcentVDest{{ $numero }}').val("1");
            }
            Calculoespacitiempo();
        });

        $('#listaPlanetas{{ $numero }}').change(function() {
            SelectorDestinos({{ $numero }});
            Calculoespacitiempo();
        });

        $('#personal{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'personal');
        });

        $('#mineral{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'mineral');
        });

        $('#cristal{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'cristal');
        });

        $('#gas{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'gas');
        });

        $('#plastico{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'plastico');
        });

        $('#ceramica{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'ceramica');
        });

        $('#liquido{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'liquido');
        });

        $('#micros{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'micros');
        });

        $('#fuel{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'fuel');
        });

        $('#ma{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'ma');
        });

        $('#municion{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'municion');
        });

        $('#creditos{{ $numero }}').keyup(function() {
            ModificandoRecurso({{ $numero }}, 'creditos');
        });


        $('#ordenDest{{ $numero }}').change(function() {
            var orden = $("#ordenDest{{ $numero }}").val();
            destinos[{{ $numero }}].mision = orden;
            Avisos();
        });
    });

</script>
