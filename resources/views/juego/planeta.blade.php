@extends('juego.layouts.recursosFrame')
@section('content')

    @php
    $nivelTerraformador = $planetaActual->construcciones->where('codigo', 'terraformadorMinero')->first()->nivel;
    @endphp

    <div class="container-fluid">
        <div class="container-fluid">
            <nav>
                <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px"
                    align="center">
                    <a class="nav-item nav-link" id="colonia-tab" data-bs-toggle="tab" href="#colonia" role="tab"
                        aria-controls="colonia" aria-selected="true" onclick="tabsPlanetas('colonia-tab')">
                        Colonia
                    </a>
                    <a class="nav-item nav-link" id="producciones-tab" data-bs-toggle="tab" href="#producciones" role="tab"
                        aria-controls="producciones" aria-selected="false" onclick="tabsPlanetas('producciones-tab')">
                        Producciones
                    </a>
                    <a class="nav-item nav-link" id="tecnologia-tab" data-bs-toggle="tab" href="#tecnologia" role="tab"
                        aria-controls="tecnologia" aria-selected="false" onclick="tabsPlanetas('tecnologia-tab')">
                        Desbloqueo por tecnologia
                    </a>
                    <a class="nav-item nav-link" id="refugio-tab" data-bs-toggle="tab" href="#refugio" role="tab"
                        aria-controls="refugio" aria-selected="false" onclick="tabsPlanetas('refugio-tab')">
                        Refugio
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="colonia" role="tabpanel" aria-labelledby="colonia-tab">
                    <table class="table table-sm text-center table-borderless anchofijo cajita rounded align-middle">
                        <tr>
                            <th colspan="3" class="anchofijo text-success borderless">
                                <big>Resumen de la colonia</big>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                @if (count(Auth::user()->jugador->planetas) > 1)
                                    <button type="button" class="btn btn-outline-danger col-12"
                                        onclick="window.location.href = '/juego/destruirColonia'">
                                        <i class="fa fa-times-circle"></i> Destruir colonia
                                    </button>
                                @else
                                    <button type="button" class="btn btn-outline-light col-12" disabled>
                                        <i class="fa fa-times-circle"></i> No puedes destruir tu último planeta
                                    </button>
                                @endif
                            </td>
                            <td class="anchofijo text-secondary borderless">
                                <div class="input-group mb-3 borderless"
                                    style="padding-left: 5px !important; padding-right: 5px !important">
                                    <span class="input-group-text bg-dark text-light" style="padding: 0px">
                                        @if (count(Auth::user()->jugador->planetas) > 1)
                                            <button type="button" class="btn btn-dark text-light"
                                                onclick="sendCederColonia()">
                                                Ceder colonia
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-dark text-light" disabled>
                                                Ceder colonia
                                            </button>
                                        @endif
                                    </span>
                                    <select name="listaJugadores" id="listaJugadores" class="form-control"></select>
                                    <script>
                                        $('#listaJugadores').select2({
                                            placeholder: "Nombre del jugador",
                                            data: [{
                                                    id: 0,
                                                    text: "Nombre del jugador"
                                                },
                                                @foreach ($jugadores as $jugador)
                                                    { id: {{ $jugador->id }}, text: "{{ $jugador->nombre }}" },
                                                @endforeach
                                            ],
                                            language: "es"
                                        });

                                    </script>
                                </div>
                            </td>
                            <td class="anchofijo text-secondary borderless">
                                <div class="input-group mb-3 borderless"
                                    style="padding-left: 10px !important; padding-right: 5px !important">
                                    <span class="input-group-text bg-dark text-light" style="padding: 0px">
                                        <button type="button" class="btn btn-dark text-light"
                                            onclick="sendRenombrarColonia()">
                                            Renombrar colonia
                                        </button>
                                    </span>
                                    <input id="nombreColonia" type="text" class="form-control input"
                                        placeholder="Nombre de la colonia" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table
                        class="table table-sm table-dark table-borderless text-center anchofijo cajita rounded align-middle"
                        style="--bs-table-bg: transparent !important">
                        <tr>
                            <th colspan="6" class="anchofijo text-success ">
                                <big>Yacimientos y terraformador</big>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="6" class="anchofijo text-light ">
                                Los <span class="text-success">yacimientos</span> determinan la produccion de las minas.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="anchofijo text-light ">
                                El <span class="text-success">terraformador</span> es un edificio que nos ayuda a subir el
                                nivel de nuestros yacimientos para poder produccir más en la colonia.
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning ">
                                Tipo
                            </td>
                            <td class="anchofijo text-warning ">
                                Mineral
                            </td>
                            <td class="anchofijo text-warning ">
                                Cristal
                            </td>
                            <td class="anchofijo text-warning ">
                                Gas
                            </td>
                            <td class="anchofijo text-warning ">
                                Plastico
                            </td>
                            <td class="anchofijo text-warning ">
                                Ceramica
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning ">
                                Yacimientos
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $planetaActual->cualidades->mineral }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $planetaActual->cualidades->cristal }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $planetaActual->cualidades->gas }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $planetaActual->cualidades->plastico }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $planetaActual->cualidades->ceramica }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning ">
                                Terraformador
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light ">
                                {{ $nivelTerraformador }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-primary ">
                                Total
                            </td>
                            <td class="anchofijo text-primary ">
                                {{ $planetaActual->cualidades->mineral + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary ">
                                {{ $planetaActual->cualidades->cristal + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary ">
                                {{ $planetaActual->cualidades->gas + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary ">
                                {{ $planetaActual->cualidades->plastico + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary ">
                                {{ $planetaActual->cualidades->ceramica + $nivelTerraformador }}
                            </td>
                        </tr>
                    </table>
                    <div class="cajita rounded">
                        <table
                            class="table table-sm table-dark table-hover table-borderless text-center anchofijo align-middle"
                            style="--bs-table-bg: transparent !important">
                            <tr>
                                <th colspan="12" class="anchofijo text-success">
                                    <span class="fw-boil fs-5">Resumen de produccion e industrias</span>
                                </th>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Industrias/Minas
                                </td>
                                <td class="anchofijo text-warning">
                                    Personal
                                </td>
                                <td class="anchofijo text-warning">
                                    Mineral
                                </td>
                                <td class="anchofijo text-warning">
                                    Cristal
                                </td>
                                <td class="anchofijo text-warning">
                                    Gas
                                </td>
                                <td class="anchofijo text-warning">
                                    Plastico
                                </td>
                                <td class="anchofijo text-warning">
                                    Ceramica
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
                                    MA
                                </td>
                                <td class="anchofijo text-warning">
                                    Municion
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Produccion de las minas
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->personal, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->mineral, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->cristal, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->gas, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->plastico, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->ceramica, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Yacimientos y terraformador
                                </td>
                                <td class="text-muted">
                                    0
                                </td>
                                <td class="text-success">
                                    {{ number_format($produccionesSinCalcular->mineral * (($planetaActual->cualidades->mineral + $nivelTerraformador) / 100), 0, ',', '.') }}
                                </td>
                                <td class="text-success">
                                    {{ number_format($produccionesSinCalcular->cristal * (($planetaActual->cualidades->cristal + $nivelTerraformador) / 100), 0, ',', '.') }}
                                </td>
                                <td class="text-success">
                                    {{ number_format($produccionesSinCalcular->gas * (($planetaActual->cualidades->gas + $nivelTerraformador) / 100), 0, ',', '.') }}
                                </td>
                                <td class="text-success">
                                    {{ number_format($produccionesSinCalcular->plastico * (($planetaActual->cualidades->plastico + $nivelTerraformador) / 100), 0, ',', '.') }}
                                </td>
                                <td class="text-success">
                                    {{ number_format($produccionesSinCalcular->ceramica * (($planetaActual->cualidades->ceramica + $nivelTerraformador) / 100), 0, ',', '.') }}
                                </td>
                                <td class="text-muted">
                                    0
                                </td>
                                <td class="text-muted">
                                    0
                                </td>
                                <td class="text-muted">
                                    0
                                </td>
                                <td class="text-muted">
                                    0
                                </td>
                                <td class="text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Industria liquido
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-danger">
                                    -{{ number_format($produccionesSinCalcular->liquido * $constantes->where('codigo', 'costoLiquido')->first()->valor, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->liquido, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Industria micros
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-danger">
                                    -{{ number_format($produccionesSinCalcular->micros * $constantes->where('codigo', 'costoMicros')->first()->valor, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->micros, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Industria fuel
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-danger">
                                    -{{ number_format($produccionesSinCalcular->fuel * $constantes->where('codigo', 'costoFuel')->first()->valor, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->fuel, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Industria MA
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-danger">
                                    -{{ number_format($produccionesSinCalcular->ma * $constantes->where('codigo', 'costoMa')->first()->valor, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->ma, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Industria municion
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-danger">
                                    -{{ number_format($produccionesSinCalcular->municion * $constantes->where('codigo', 'costoMunicion')->first()->valor, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->municion, 0, ',', '.') }}
                                </td>
                            </tr>

                            <!-- Tecnologias! ////////////////////////////////////////////////////////////////////////-->

                            <tr>
                                <td class="anchofijo text-info">
                                    Mejora liquido
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->liquido * ($factoresIndustrias[0] - 1), 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-info">
                                    Mejora micros
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->micros * ($factoresIndustrias[1] - 1), 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-info">
                                    Mejora fuel
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->fuel * ($factoresIndustrias[2] - 1), 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-info">
                                    Mejora MA
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->ma * ($factoresIndustrias[3] - 1), 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-info">
                                    Mejora municion
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-muted">
                                    0
                                </td>
                                <td class="anchofijo text-success">
                                    {{ number_format($produccionesSinCalcular->municion, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-primary">
                                    Totales por hora
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->personal, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->mineral, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->cristal, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->gas, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->plastico, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->ceramica, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccionesSinCalcular->liquido * $factoresIndustrias[0], 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccionesSinCalcular->micros * $factoresIndustrias[1], 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccionesSinCalcular->fuel * $factoresIndustrias[2], 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccionesSinCalcular->ma * $factoresIndustrias[3], 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccionesSinCalcular->municion * $factoresIndustrias[4], 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-primary">
                                    Totales por dia
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->personal * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->mineral * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->cristal * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->gas * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->plastico * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->ceramica * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->liquido * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->micros * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->fuel * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->ma * 24, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->municion * 24, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-primary">
                                    Totales por semana
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->personal * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->mineral * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->cristal * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->gas * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->plastico * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->ceramica * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->liquido * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->micros * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->fuel * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->ma * 24 * 7, 0, ',', '.') }}
                                </td>
                                <td class="text-primary">
                                    {{ number_format($produccion->municion * 24 * 7, 0, ',', '.') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="producciones" role="tabpanel" aria-labelledby="producciones-tab">
                    <div class="cajita rounded">
                        <table
                            class="table table-dark table-hover table-borderless table text-center anchofijo align-middle"
                            style="--bs-table-bg: transparent !important">
                            <tr>
                                <th colspan="12" class="anchofijo text-success">
                                    <big>
                                        Producciones base de las minas
                                    </big>
                                </th>
                            </tr>
                            <tr>
                                <td class="anchofijo text-success">
                                    Nivel
                                </td>
                                <td class="anchofijo text-success">
                                    Personal
                                </td>
                                <td class="anchofijo text-success">
                                    Mineral
                                </td>
                                <td class="anchofijo text-success">
                                    Cristal
                                </td>
                                <td class="anchofijo text-success">
                                    Gas
                                </td>
                                <td class="anchofijo text-success">
                                    Plastico
                                </td>
                                <td class="anchofijo text-success">
                                    Ceramica
                                </td>
                                <td class="anchofijo text-success">
                                    Liquido
                                </td>
                                <td class="anchofijo text-success">
                                    Micros
                                </td>
                                <td class="anchofijo text-success">
                                    Fuel
                                </td>
                                <td class="anchofijo text-success">
                                    MA
                                </td>
                                <td class="anchofijo text-success">
                                    Municion
                                </td>
                            </tr>
                            @foreach ($tablaProduccion as $prod)
                                <tr>
                                    <td class="anchofijo text-warning">
                                        {{ number_format($prod->nivel, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->personal, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->mineral, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->cristal, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->gas, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->plastico, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->ceramica, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->liquido, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->micros, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->fuel, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->ma, 0, ',', '.') }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ number_format($prod->municion, 0, ',', '.') }}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="tecnologia" role="tabpanel" aria-labelledby="tecnologia-tab">
                    <div class="cajita rounded">
                        <table class="table table-dark table-hover table-borderless table text-center align-middle"
                            style="--bs-table-bg: transparent !important">
                            <tr>
                                <th colspan="4" class="anchofijo text-success text-center">
                                    <big>
                                        Tecnologias y desbloqueos
                                    </big>
                                </th>
                            </tr>
                            <tr>
                                <td class="anchofijo text-success">
                                    Tecnologia
                                </td>
                                <td class="anchofijo text-success">
                                    Nivel
                                </td>
                                <td class="anchofijo text-success">
                                    Nombre
                                </td>
                                <td class="anchofijo text-success">
                                    Descripcion
                                </td>
                            </tr>
                            @foreach ($desbloqueos as $arma)
                                <tr>
                                    <td class="anchofijo text-warning">
                                        {{ __('investigacion.' . $arma->clase) }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ $arma->niveltec }}
                                    </td>
                                    <td class="anchofijo text-light">
                                        {{ $arma->nombre }}
                                    </td>
                                    <td class="anchofijo text-light text-start">
                                        {{ $arma->descripcion }}
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade show" id="refugio" role="tabpanel" aria-labelledby="refugio-tab">
                    <div class="cajita rounded">
                        <table
                            class="table table-dark table-hover table-borderless table text-center anchofijo align-middle"
                            style="--bs-table-bg: transparent !important">
                            <tr>
                                <th colspan="12" class="anchofijo text-success">
                                    <big>
                                        Recursos protegidos por el refugio
                                    </big>
                                </th>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Recursos
                                </td>
                                <td class="anchofijo text-warning">
                                    Mineral
                                </td>
                                <td class="anchofijo text-warning">
                                    Cristal
                                </td>
                                <td class="anchofijo text-warning">
                                    Gas
                                </td>
                                <td class="anchofijo text-warning">
                                    Plastico
                                </td>
                                <td class="anchofijo text-warning">
                                    Ceramica
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
                                    MA
                                </td>
                                <td class="anchofijo text-warning">
                                    Municion
                                </td>
                                <td class="anchofijo text-warning">
                                    Créditos
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Capacidad del refugio
                                </td>
                                @for ($i = 0; $i < 11; $i++)
                                    <td class="anchofijo text-light">
                                        {{ number_format($capacidadRefugio, 0, ',', '.') }}
                                    </td>
                                @endfor
                            </tr>
                            <tr>
                                <td class="anchofijo text-danger">
                                    Recursos sin proteccion
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->mineral ? '0' : number_format($capacidadRefugio - $recursos->mineral, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->cristal ? '0' : number_format($capacidadRefugio - $recursos->cristal, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->gas ? '0' : number_format($capacidadRefugio - $recursos->gas, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->plastico ? '0' : number_format($capacidadRefugio - $recursos->plastico, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->ceramica ? '0' : number_format($capacidadRefugio - $recursos->ceramica, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->liquido ? '0' : number_format($capacidadRefugio - $recursos->liquido, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->micros ? '0' : number_format($capacidadRefugio - $recursos->micros, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->fuel ? '0' : number_format($capacidadRefugio - $recursos->fuel, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->ma ? '0' : number_format($capacidadRefugio - $recursos->ma, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->municion ? '0' : number_format($capacidadRefugio - $recursos->municion, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-danger">
                                    {{ $capacidadRefugio >= $recursos->creditos ? '0' : number_format($capacidadRefugio - $recursos->creditos, 0, ',', '.') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="anchofijo text-warning">
                                    Restante
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->mineral ? '0' : number_format($capacidadRefugio - $recursos->mineral, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->cristal ? '0' : number_format($capacidadRefugio - $recursos->cristal, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->gas ? '0' : number_format($capacidadRefugio - $recursos->gas, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->plastico ? '0' : number_format($capacidadRefugio - $recursos->plastico, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->ceramica ? '0' : number_format($capacidadRefugio - $recursos->ceramica, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->liquido ? '0' : number_format($capacidadRefugio - $recursos->liquido, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->micros ? '0' : number_format($capacidadRefugio - $recursos->micros, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->fuel ? '0' : number_format($capacidadRefugio - $recursos->fuel, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->ma ? '0' : number_format($capacidadRefugio - $recursos->ma, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->municion ? '0' : number_format($capacidadRefugio - $recursos->municion, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light">
                                    {{ $capacidadRefugio < $recursos->creditos ? '0' : number_format($capacidadRefugio - $recursos->creditos, 0, ',', '.') }}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        mostrarTab(@json($tab));

    </script>
@endsection
