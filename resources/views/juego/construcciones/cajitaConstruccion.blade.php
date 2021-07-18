<div class="cajita-warning rounded text-center p-2">
    {{-- CABECERA --}}
    <div class="row align-items-center">
        <div class="col text-success fs-5 fw-bold">
            {{ __('construccion.' . $construccion->codigo) }}
            <span class="text-light">
                nivel {{ $construccion->nivel }}
            </span>
        </div>
        <div class="col">
            <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                title="Fecha de finalización si se construye ahora">
                Termina: <span class="text-warning" id="{{ 'termina' . $construccion->codigo }}"></span>
            </span>
        </div>
        <div class="col">
            <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tiempo de construcción">
                Tarda <span class="text-danger" id="{{ 'tiempo' . $construccion->codigo }}"></span>
            </span>
        </div>
        <div class="col">
            <div class="input-group">
                <input id="{{ 'personal' . $construccion->codigo }}" type="number"
                    class="personal1 form-control input" min="0" placeholder="personal"
                    value="{{ number_format(floor($personal), 0, '', '') }}"
                    onkeyup='calculaTiempo(@json($construccion->coste), @json($velocidadConst->valor), @json($construccion->codigo))'>
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
            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construccion->codigo . '.jpg') }}"
                width="100" height="100">
        </div>

        <div class="col {{ $construccion->coste->mineral == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }}">
                    Mineral
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->mineral > 0 && $construccion->coste->mineral > $recursos->mineral ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->mineral > 0 ? number_format($construccion->coste->mineral, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->mineral > 0 && $construccion->coste->mineral > $recursos->mineral ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->mineral > 0 ? number_format($recursos->mineral - $construccion->coste->mineral, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $construccion->coste->cristal == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }}">
                    Cristal
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->cristal > 0 && $construccion->coste->cristal > $recursos->cristal ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->cristal > 0 ? number_format($construccion->coste->cristal, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->cristal > 0 && $construccion->coste->cristal > $recursos->cristal ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->cristal > 0 ? number_format($recursos->cristal - $construccion->coste->cristal, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $construccion->coste->gas == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->gas == 0 ? 'text-muted' : 'text-warning' }}">
                    Gas
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->gas > 0 && $construccion->coste->gas > $recursos->gas ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->gas > 0 ? number_format($construccion->coste->gas, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->gas > 0 && $construccion->coste->gas > $recursos->gas ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->gas > 0 ? number_format($recursos->gas - $construccion->coste->gas, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $construccion->coste->plastico == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }}">
                    Plastico
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->plastico > 0 && $construccion->coste->plastico > $recursos->plastico ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->plastico > 0 ? number_format($construccion->coste->plastico, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->plastico > 0 && $construccion->coste->plastico > $recursos->plastico ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->plastico > 0 ? number_format($recursos->plastico - $construccion->coste->plastico, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $construccion->coste->ceramica == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }}">
                    Ceramica
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->ceramica > 0 && $construccion->coste->ceramica > $recursos->ceramica ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->ceramica > 0 ? number_format($construccion->coste->ceramica, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->ceramica > 0 && $construccion->coste->ceramica > $recursos->ceramica ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->ceramica > 0 ? number_format($recursos->ceramica - $construccion->coste->ceramica, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $construccion->coste->liquido == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }}">
                    Liquido
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->liquido > 0 && $construccion->coste->liquido > $recursos->liquido ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->liquido > 0 ? number_format($construccion->coste->liquido, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->liquido > 0 && $construccion->coste->liquido > $recursos->liquido ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->liquido > 0 ? number_format($recursos->liquido - $construccion->coste->liquido, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col {{ $construccion->coste->micros == 0 ? 'd-none d-lg-block' : '' }}">
            <div class="row">
                <div class="col p-1 {{ $construccion->coste->micros == 0 ? 'text-muted' : 'text-warning' }}">
                    Micros
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->micros > 0 && $construccion->coste->micros > $recursos->micros ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Coste de este recurso para la construcción">
                        {{ $construccion->coste->micros > 0 ? number_format($construccion->coste->micros, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div
                    class="col p-1 {{ $construccion->coste->micros > 0 && $construccion->coste->micros > $recursos->micros ? 'text-danger' : 'text-light' }}">
                    <span data-bs-toggle="tooltip" data-bs-placement="bottom"
                        title="Recursos restantes una vez demos la orden de construir">
                        {{ $construccion->coste->micros > 0 ? number_format($recursos->micros - $construccion->coste->micros, 0, ',', '.') : '' }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    {{-- BOTONERA --}}
    <div class="row align-items-center">
        <div class="col">
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
        </div>

        <div class="col">
            <button type="button" class="btn btn-outline-info col-12 " data-bs-toggle="modal"
                data-bs-target="#datosModal" onclick="mostrarDatosConstruccion('{{ $construccion->codigo }}')">
                <i class="fa fa-info"></i> Información
            </button>
        </div>

        @if (substr($construccion->codigo, 0, 3) == 'ind' and substr($construccion->codigo, 3) != 'Personal')
            <div class="col">
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
            </div>
        @endif

        <div class="col">
            @if ($dependencia->nivelRequiere <= $nivel)
                @if ($construccion->nivel >= 99 or $construccion->coste->mineral >
                $recursos->mineral or $construccion->coste->cristal > $recursos->cristal or $construccion->coste->gas >
                $recursos->gas or $construccion->coste->plastico > $recursos->plastico or $construccion->coste->ceramica
                > $recursos->ceramica or $construccion->coste->liquido > $recursos->liquido or
                $construccion->coste->micros > $recursos->micros) <button type="button"
                class="btn
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
        </div>
    </div>
</div>

<script>
    calculaTiempo(@json($construccion->coste), @json($velocidadConst->valor), @json($construccion->codigo));

    // Tooltip
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
</script>
