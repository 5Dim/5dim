<div class="col-12 cajita-success rounded">
    <div id="cuadro1" class="table-responsive">
        <table class="table table-borderless borderless table-sm text-center anchofijo"
            style="margin-top: 5px !important">
            <tr>
                <th colspan="7" class="text-success">
                    <big>
                        Destino {{ $numero }}
                    </big>
                </th>
            </tr>
            <tr>
                <th rowspan="2" class="align-middle">
                    <img class="rounded" src="{{ asset('img/juego/skin0/edificios/minaMineral.jpg') }}" width="120"
                        height="120">
                </th>
                <th class="text-warning align-middle">
                    Planetas
                </th>
                <th class="text-warning align-middle">
                    Sistema solar
                </th>
                <th class="text-warning align-middle">
                    Estrella
                </th>
                <th class="text-warning align-middle">
                    Orden
                </th>
                <th class="text-warning align-middle">
                    Porcentaje de velocidad
                </th>
                <th class="text-warning align-middle">
                    Velocidad actual
                </th>
                <th class="text-warning align-middle">
                    Consumo de fuel
                </th>
                <th class="text-warning align-middle">
                    Tiempo de viaje
                </th>
            </tr>
            <tr>
                <td class="text-light">
                    <select name="listaPlanetas{{ $numero }}" id="listaPlanetas{{ $numero }}"
                        class="form-control">
                        <option value="none">Selecciona un planeta</option>
                        <optgroup label="Propios">
                            @foreach (Auth::user()->jugador->planetas as $planeta)
                                <option value="{{ $planeta->id }}">
                                    {{ $planeta->estrella }}x{{ $planeta->orbita }}
                                    {{ $planeta->nombre }}
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                </td>
                <td class="text-light">
                    <input type="text" class="form-control input" placeholder="Numero de sistema">
                </td>
                <td class="text-light">
                    <input type="text" class="form-control input" placeholder="Numero de orbita">
                </td>
                <td class="text-light">
                    <select name="orden" id="orden" class="select form-control">
                        <option value="" selected>-- Selecciona una orden --</option>
                        <option value="transportar">Transportar</option>
                        <option value="transferir">Transferir</option>
                        <option value="bloquear">Bloquear</option>
                        <option value="atacar">Atacar</option>
                        <option value="recolectar">Recolectar</option>
                    </select>
                </td>
                <td class="text-light">
                    <div class="input-group mb-3 borderless"
                        style="padding-left: 10px !important; padding-right: 5px !important">
                        <input type="text" class="form-control input" value="100" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text bg-dark text-light">%</span>
                        </div>
                    </div>
                </td>
                <td class="text-light">
                    6.24
                </td>
                <td class="text-light">
                    1.390
                </td>
                <td class="text-light">
                    12:01:12
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
                    <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                        Tienes
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->personal - $personalOcupado, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->mineral, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->cristal, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->gas, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->plastico, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->ceramica, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->liquido, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->micros, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->fuel, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->ma, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->municion, 0, ',', '.') }}
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <button type="button" class="btn btn-dark col-12 btn-sm">
                        {{ number_format($recursos->creditos, 0, ',', '.') }}
                    </button>
                </td>
            </tr>
            <tr>
                <td class="anchofijo">
                    <button type="button" class="btn btn-dark col-12 btn-sm text-warning">
                        Envias
                    </button>
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
                </td>
                <td class="anchofijo text-light">
                    <input type="text" class="form-control input form-control-sm" value="0" min="0" max="125248">
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
    });

</script>
