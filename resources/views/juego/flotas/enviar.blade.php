


    <div class="container-fluid">
        <div class="container-fluid">
            <div class="col-12 cajita-info rounded">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="15" class="anchofijo text-success">
                                <big>
                                    Naves
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="anchofijo text-warning align-middle">
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Nombre
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Ataque
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Defensa
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Carga
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H.cazas
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H.ligeras
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H.medias
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                H.pesadas
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Vel.Impulso
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Hypervelocidad
                            </th>
                            <th class="anchofijo text-warning align-middle">
                                Cantidad
                            </th>
                            <th class="anchofijo text-warning align-middle" style="max-width: 180px">
                                <div class="input-group mb-3 input-group-sm borderless">
                                    <span class="input-group-text bg-dark text-light">
                                        <button type="button" class="btn btn-dark btn-sm text-warning"
                                            onclick="NaveGeneralAFlota(0)">
                                            0
                                        </button>
                                    </span>
                                    <span class="text-warning form-control input">
                                        En flota
                                    </span>
                                    <span class="input-group-text bg-dark text-light">
                                        <button type="button" class="btn btn-dark btn-sm text-warning"
                                            onclick="NaveGeneralAFlota(1)">
                                            M
                                        </button>
                                    </span>
                                </div>
                            </th>
                            <th class="anchofijo text-warning align-middle" style="max-width: 180px">
                                <div class="input-group mb-3 input-group-sm borderless">
                                    <span class="input-group-text bg-dark text-light">
                                        <button type="button" class="btn btn-dark btn-sm text-warning"
                                            onclick="NaveGeneralAHangar(0)">
                                            0
                                        </button>
                                    </span>
                                    <span class="text-warning form-control input">
                                        En hangar
                                    </span>
                                    <span class="input-group-text bg-dark text-light">
                                        <button type="button" class="btn btn-dark btn-sm text-warning"
                                            onclick="NaveGeneralAHangar(1)">
                                            M
                                        </button>
                                    </span>
                                </div>
                            </th>
                        </tr>
                        @foreach ($navesEstacionadas as $nave)
                            <tr>
                                <td name="imagen{{ $nave->disenios_id }}" id="imagen{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                    <img class="rounded"
                                    src="{{ asset('img/fotos naves/skin'.$nave->skin.'/naveLTH' . $nave->fuselajes_id . '.png') }}"
                                    width="45" height="28">
                                </td>
                                <td name="nombre{{ $nave->disenios_id }}" id="nombre{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="ataque{{ $nave->disenios_id }}" id="ataque{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="defensa{{ $nave->disenios_id }}" id="defensa{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="carga{{ $nave->disenios_id }}" id="carga{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarCazas{{ $nave->disenios_id }}" id="hangarCazas{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarLigeras{{ $nave->disenios_id }}" id="hangarLigeras{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarMedias{{ $nave->disenios_id }}" id="hangarMedias{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="hangarPesadas{{ $nave->disenios_id }}" id="hangarPesadas{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="maniobra{{ $nave->disenios_id }}" id="maniobra{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="velocidad{{ $nave->disenios_id }}" id="velocidad{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td name="cantidad{{ $nave->disenios_id }}" id="cantidad{{ $nave->disenios_id }}"
                                    class="anchofijo text-light align-middle">
                                </td>
                                <td id="selectaflota{{ $nave->disenios_id }}" class="anchofijo text-light"
                                    style="max-width: 180px">
                                    <div class="input-group mb-3 input-group-sm borderless">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAflota({{ $nave->disenios_id }},0)">
                                                    0
                                                </button>
                                            </span>
                                        </div>
                                        <input id="enflota{{ $nave->disenios_id}}" type="text" class="form-control input"
                                            value="0" aria-label="" onKeyUp="NaveAflota({{ $nave->disenios_id }},'x')"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAflota({{ $nave->disenios_id }},'m')">
                                                    M
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                                <td id="selectahangar{{ $nave->disenios_id }}" class="anchofijo text-light"
                                    style="max-width: 180px">
                                    <div class="input-group mb-3 input-group-sm borderless">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAhangar({{ $nave->disenios_id }},0)">
                                                    0
                                                </button>
                                            </span>
                                        </div>
                                        <input id="enhangar{{ $nave->disenios_id }}" type="text" class="form-control input"
                                            value="0" aria-label="" onKeyUp="NaveAhangar({{ $nave->disenios_id }},'x')"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-dark text-light">
                                                <button type="button" class="btn btn-dark btn-sm text-warning"
                                                    onclick="NaveAhangar({{ $nave->disenios_id }},'m')">
                                                    M
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <table class="table table-borderless borderless table-sm text-center anchofijo"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="9" class="text-success">
                                <big>
                                    Resumen de la flota
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Nombre privado
                            </th>
                            <th class="text-warning align-middle">
                                Carga
                            </th>
                            <th class="text-warning align-middle">
                                Municion
                            </th>
                            <th class="text-warning align-middle">
                                Fuel
                            </th>
                            <th class="text-warning align-middle">
                                Vel. Impulso
                            </th>
                            <th class="text-warning align-middle">
                                Hypervelocidad
                            </th>
                            <th class="text-warning align-middle">
                                Ataque real
                            </th>
                            <th class="text-warning align-middle">
                                Defensa Real
                            </th>
                            <th class="text-warning align-middle">
                                Ataque visible
                            </th>
                            <th class="text-warning align-middle">
                                Defensa visible
                            </th>
                            <th class="text-warning align-middle">
                                Recolección
                            </th>
                            <th class="text-warning align-middle">
                                Extracción
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" id="nombreFlota" class="form-control input" placeholder="Nombre privado
                                aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </td>
                            <td id="totalcarga" class="text-light align-middle">
                            </td>
                            <td id="totalmunicion" class="text-light align-middle">
                            </td>
                            <td id="totalfuel" class="text-light align-middle">
                            </td>
                            <td id="totalvelocidad" class="text-light align-middle">
                            </td>
                            <td id="totalmaniobra" class="text-light align-middle">
                            </td>
                            <td id="totalataqueR" class="text-light align-middle">
                            </td>
                            <td id="totaldefensaR" class="text-light align-middle">
                            </td>
                            <td id="totalataqueV" class="text-light align-middle">
                            </td>
                            <td id="totaldefensaV" class="text-light align-middle">
                            </td>
                            <td id="totalrecoleccionV" class="text-light align-middle">
                            </td>
                            <td id="totalextraccionV" class="text-light align-middle">
                            </td>
                        </tr>
                    </table>
                    <table class="table table-borderless borderless table-sm text-center"
                        style="margin-top: 5px !important">
                        <tr>
                            <th colspan="6" class="text-success">
                                <big>
                                    Estado de los hangares
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <th class="text-warning align-middle">
                                Tipos
                            </th>
                            <th class="text-warning align-middle">
                                Cazas
                            </th>
                            <th class="text-warning align-middle">
                                Ligeras
                            </th>
                            <th class="text-warning align-middle">
                                Medias
                            </th>
                            <th class="text-warning align-middle">
                                Pesadas
                            </th>
                            <th class="text-warning align-middle">
                                Estaciones
                            </th>
                        </tr>
                        <tr>
                            <th id="fueraH" class="text-warning align-middle">
                                Fuera de hangar
                            </th>
                            <td id="fueraHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="fueraHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th id="dentroH" class="text-warning align-middle">
                                En hangares
                            </th>
                            <td id="dentroHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="dentroHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                        <tr>
                            <th id="capacidadH" class="text-warning align-middle">
                                Capacidad hangares
                            </th>
                            <td id="capacidadHcargaPequenia" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaMediana" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaGrande" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaEnorme" class="text-light align-middle">
                                0
                            </td>
                            <td id="capacidadHcargaMega" class="text-light align-middle">
                                0
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 cajita-info rounded">
                <button id="botonEnviar" type="button" class="btn btn-success col-12"  onclick="enviarFlota()">
                    Enviar flota
                </button>
            </div>
            @for ($dest=0;$dest <$cantidadDestinos+1;$dest++)
                @include('juego.flotas.destino', [ 'destino' => 'destino'.$dest, 'numero' => $dest])
            @endfor

        </div>
    </div>

    <script>
        let constantes = @json($constantes);
        let navesEstacionadas = @json($navesEstacionadas);
        let diseniosJugador = @json($diseniosJugador);
        let investigaciones = @json($investigaciones);
        let constantesU = @json($constantesU);
        let ViewDaniosDisenios = @json($ViewDaniosDisenios);
        let origenImagenes="{{ asset('img/juego/skin0/')}}";
        let destinos = @json($destinos);
        let cargaDest = @json($cargaDest); //cargado para cada destino
        let prioridades =@json($prioridades);
        let flota =@json($flota);
        let linkFlota="{{ url('/juego/flotas') }}";


        recursosDest = [];  //recursos que hay en cada destino (el 0 es el origen)
        recursosDest[0] = @json($recursos);


    </script>

    <!-- Personalizado -->
    <script src="{{ asset('js/flotas.js') }}"></script>

