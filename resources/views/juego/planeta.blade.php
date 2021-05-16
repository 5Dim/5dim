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
                    <a class="nav-item nav-link active" id="colonia-tab" data-bs-toggle="tab" href="#colonia" role="tab"
                        aria-controls="colonia" aria-selected="true">
                        Colonia
                    </a>
                    <a class="nav-item nav-link" id="producciones-tab" data-bs-toggle="tab" href="#producciones" role="tab"
                        aria-controls="producciones" aria-selected="false">
                        Producciones
                    </a>
                    <a class="nav-item nav-link" id="tecnologia-tab" data-bs-toggle="tab" href="#tecnologia" role="tab"
                        aria-controls="tecnologia" aria-selected="false">
                        Desbloqueo por tecnologia
                    </a>
                    <a class="nav-item nav-link" id="refugio-tab" data-bs-toggle="tab" href="#refugio" role="tab"
                        aria-controls="refugio" aria-selected="false">
                        Refugio
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="colonia" role="tabpanel" aria-labelledby="colonia-tab">
                    <table class="table table-sm text-center anchofijo cajita rounded align-middle">
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
                                    <div class="input-group-append">
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
                                    </div>
                                    <select name="listaJugadores" id="listaJugadores" class="form-control"></select>
                                    <script>
                                        $('#listaJugadores').select2({
                                            // theme: "bootstrap",
                                            // width: '100%',
                                            // closeOnSelect: false,
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
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light" style="padding: 0px">
                                            <button type="button" class="btn btn-dark text-light"
                                                onclick="sendRenombrarColonia()">
                                                Renombrar colonia
                                            </button>
                                        </span>
                                    </div>
                                    <input id="nombreColonia" type="text" class="form-control input"
                                        placeholder="Nombre de la colonia" aria-label="Recipient's username"
                                        aria-describedby="basic-addon2">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-borderless text-center anchofijo cajita rounded align-middle">
                        <tr>
                            <th colspan="6" class="anchofijo text-success borderless">
                                <big>Yacimientos y terraformador</big>
                            </th>
                        </tr>
                        <tr>
                            <td colspan="6" class="anchofijo text-light borderless">
                                Los <span class="text-success">yacimientos</span> determinan la produccion de las minas.
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="anchofijo text-light borderless">
                                El <span class="text-success">terraformador</span> es un edificio que nos ayuda a subir el
                                nivel de nuestros yacimientos para poder produccir más en la colonia.
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Tipo
                            </td>
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
                                Ceramica
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Yacimientos
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $planetaActual->cualidades->mineral }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $planetaActual->cualidades->cristal }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $planetaActual->cualidades->gas }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $planetaActual->cualidades->plastico }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $planetaActual->cualidades->ceramica }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Terraformador
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $nivelTerraformador }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-primary borderless">
                                Total
                            </td>
                            <td class="anchofijo text-primary borderless">
                                {{ $planetaActual->cualidades->mineral + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary borderless">
                                {{ $planetaActual->cualidades->cristal + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary borderless">
                                {{ $planetaActual->cualidades->gas + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary borderless">
                                {{ $planetaActual->cualidades->plastico + $nivelTerraformador }}
                            </td>
                            <td class="anchofijo text-primary borderless">
                                {{ $planetaActual->cualidades->ceramica + $nivelTerraformador }}
                            </td>
                        </tr>
                    </table>
                    <table class="table table-sm table-borderless text-center anchofijo cajita rounded align-middle">
                        <tr>
                            <th colspan="12" class="anchofijo text-success borderless">
                                <big>Resumen de produccion e industrias</big>
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Industrias/Minas
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Personal
                            </td>
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
                                Ceramica
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Liquido
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Micros
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Fuel
                            </td>
                            <td class="anchofijo text-warning borderless">
                                MA
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Municion
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Produccion de las minas
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->personal, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->mineral, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->cristal, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->gas, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->plastico, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->ceramica, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Yacimientos y terraformador
                            </td>
                            <td class="text-muted borderless">
                                0
                            </td>
                            <td class="text-success borderless">
                                {{ number_format($produccionesSinCalcular->mineral * (($planetaActual->cualidades->mineral + $nivelTerraformador) / 100), 0, ',', '.') }}
                            </td>
                            <td class="text-success borderless">
                                {{ number_format($produccionesSinCalcular->cristal * (($planetaActual->cualidades->cristal + $nivelTerraformador) / 100), 0, ',', '.') }}
                            </td>
                            <td class="text-success borderless">
                                {{ number_format($produccionesSinCalcular->gas * (($planetaActual->cualidades->gas + $nivelTerraformador) / 100), 0, ',', '.') }}
                            </td>
                            <td class="text-success borderless">
                                {{ number_format($produccionesSinCalcular->plastico * (($planetaActual->cualidades->plastico + $nivelTerraformador) / 100), 0, ',', '.') }}
                            </td>
                            <td class="text-success borderless">
                                {{ number_format($produccionesSinCalcular->ceramica * (($planetaActual->cualidades->ceramica + $nivelTerraformador) / 100), 0, ',', '.') }}
                            </td>
                            <td class="text-muted borderless">
                                0
                            </td>
                            <td class="text-muted borderless">
                                0
                            </td>
                            <td class="text-muted borderless">
                                0
                            </td>
                            <td class="text-muted borderless">
                                0
                            </td>
                            <td class="text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Industria liquido
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-danger borderless">
                                -{{ number_format($produccionesSinCalcular->liquido * $constantes->where('codigo', 'costoLiquido')->first()->valor, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->liquido, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Industria micros
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-danger borderless">
                                -{{ number_format($produccionesSinCalcular->micros * $constantes->where('codigo', 'costoMicros')->first()->valor, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->micros, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Industria fuel
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-danger borderless">
                                -{{ number_format($produccionesSinCalcular->fuel * $constantes->where('codigo', 'costoFuel')->first()->valor, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->fuel, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Industria MA
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-danger borderless">
                                -{{ number_format($produccionesSinCalcular->ma * $constantes->where('codigo', 'costoMa')->first()->valor, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->ma, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Industria municion
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-danger borderless">
                                -{{ number_format($produccionesSinCalcular->municion * $constantes->where('codigo', 'costoMunicion')->first()->valor, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->municion, 0, ',', '.') }}
                            </td>
                        </tr>

                        <!-- Tecnologias! ////////////////////////////////////////////////////////////////////////-->

                        <tr>
                            <td class="anchofijo text-info borderless">
                                Mejora liquido
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->liquido * ($factoresIndustrias[0] - 1), 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-info borderless">
                                Mejora micros
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->micros * ($factoresIndustrias[1] - 1), 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-info borderless">
                                Mejora fuel
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->fuel * ($factoresIndustrias[2] - 1), 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-info borderless">
                                Mejora MA
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->ma * ($factoresIndustrias[3] - 1), 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-info borderless">
                                Mejora municion
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-muted borderless">
                                0
                            </td>
                            <td class="anchofijo text-success borderless">
                                {{ number_format($produccionesSinCalcular->municion, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-primary borderless">
                                Totales por hora
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->personal, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->mineral, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->cristal, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->gas, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->plastico, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->ceramica, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccionesSinCalcular->liquido * $factoresIndustrias[0], 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccionesSinCalcular->micros * $factoresIndustrias[1], 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccionesSinCalcular->fuel * $factoresIndustrias[2], 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccionesSinCalcular->ma * $factoresIndustrias[3], 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccionesSinCalcular->municion * $factoresIndustrias[4], 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-primary borderless">
                                Totales por dia
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->personal * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->mineral * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->cristal * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->gas * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->plastico * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->ceramica * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->liquido * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->micros * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->fuel * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->ma * 24, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->municion * 24, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-primary borderless">
                                Totales por semana
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->personal * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->mineral * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->cristal * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->gas * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->plastico * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->ceramica * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->liquido * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->micros * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->fuel * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->ma * 24 * 7, 0, ',', '.') }}
                            </td>
                            <td class="text-primary borderless">
                                {{ number_format($produccion->municion * 24 * 7, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="tab-pane fade show" id="producciones" role="tabpanel" aria-labelledby="producciones-tab">
                    <table class="table table-sm table-hover table-borderless table-striped text-center anchofijo cajita-info rounded align-middle">
                        <tr>
                            <th colspan="12" class="anchofijo text-success">
                                <big>
                                    Producciones base de las minas
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-success borderless">
                                Nivel
                            </td>
                            <td class="anchofijo text-success borderless">
                                Personal
                            </td>
                            <td class="anchofijo text-success borderless">
                                Mineral
                            </td>
                            <td class="anchofijo text-success borderless">
                                Cristal
                            </td>
                            <td class="anchofijo text-success borderless">
                                Gas
                            </td>
                            <td class="anchofijo text-success borderless">
                                Plastico
                            </td>
                            <td class="anchofijo text-success borderless">
                                Ceramica
                            </td>
                            <td class="anchofijo text-success borderless">
                                Liquido
                            </td>
                            <td class="anchofijo text-success borderless">
                                Micros
                            </td>
                            <td class="anchofijo text-success borderless">
                                Fuel
                            </td>
                            <td class="anchofijo text-success borderless">
                                MA
                            </td>
                            <td class="anchofijo text-success borderless">
                                Municion
                            </td>
                        </tr>
                        @foreach ($tablaProduccion as $prod)
                            <tr>
                                <td class="anchofijo text-warning borderless">
                                    {{ number_format($prod->nivel, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->personal, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->mineral, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->cristal, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->gas, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->plastico, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->ceramica, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->liquido, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->micros, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->fuel, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->ma, 0, ',', '.') }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($prod->municion, 0, ',', '.') }}
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
                <div class="tab-pane fade show" id="tecnologia" role="tabpanel" aria-labelledby="tecnologia-tab">
                    <table class="table table-sm table-hover table-borderless table-striped cajita-info rounded align-middle">
                        <tr>
                            <th colspan="4" class="anchofijo text-success text-center">
                                <big>
                                    Tecnologias y desbloqueos
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-success borderless">
                                Tecnologia
                            </td>
                            <td class="anchofijo text-success borderless">
                                Nivel
                            </td>
                            <td class="anchofijo text-success borderless">
                                Nombre
                            </td>
                            <td class="anchofijo text-success borderless">
                                Descripcion
                            </td>
                        </tr>
                        @foreach ($desbloqueos as $arma)
                            <tr>
                                <td class="anchofijo text-warning borderless">
                                    {{ __('investigacion.' . $arma->clase) }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ $arma->niveltec }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ $arma->nombre }}
                                </td>
                                <td class="anchofijo text-light borderless">
                                    {{ $arma->descripcion }}
                                </td>
                            </tr>

                        @endforeach
                    </table>
                </div>
                <div class="tab-pane fade show" id="refugio" role="tabpanel" aria-labelledby="refugio-tab">
                    <table class="table table-sm table-borderless text-center anchofijo cajita rounded align-middle">
                        <tr>
                            <th colspan="12" class="anchofijo text-success">
                                <big>
                                    Recursos protegidos por el refugio
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Recursos
                            </td>
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
                                Ceramica
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Liquido
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Micros
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Fuel
                            </td>
                            <td class="anchofijo text-warning borderless">
                                MA
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Municion
                            </td>
                            <td class="anchofijo text-warning borderless">
                                Créditos
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Capacidad del refugio
                            </td>
                            @for ($i = 0; $i < 11; $i++)
                                <td class="anchofijo text-light borderless">
                                    {{ number_format($capacidadRefugio, 0, ',', '.') }}
                                </td>
                            @endfor
                        </tr>
                        <tr>
                            <td class="anchofijo text-danger borderless">
                                Recursos sin proteccion
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->mineral ? '0' : number_format($capacidadRefugio - $recursos->mineral, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->cristal ? '0' : number_format($capacidadRefugio - $recursos->cristal, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->gas ? '0' : number_format($capacidadRefugio - $recursos->gas, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->plastico ? '0' : number_format($capacidadRefugio - $recursos->plastico, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->ceramica ? '0' : number_format($capacidadRefugio - $recursos->ceramica, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->liquido ? '0' : number_format($capacidadRefugio - $recursos->liquido, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->micros ? '0' : number_format($capacidadRefugio - $recursos->micros, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->fuel ? '0' : number_format($capacidadRefugio - $recursos->fuel, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->ma ? '0' : number_format($capacidadRefugio - $recursos->ma, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->municion ? '0' : number_format($capacidadRefugio - $recursos->municion, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-danger borderless">
                                {{ $capacidadRefugio >= $recursos->creditos ? '0' : number_format($capacidadRefugio - $recursos->creditos, 0, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-warning borderless">
                                Restante
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->mineral ? '0' : number_format($capacidadRefugio - $recursos->mineral, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->cristal ? '0' : number_format($capacidadRefugio - $recursos->cristal, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->gas ? '0' : number_format($capacidadRefugio - $recursos->gas, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->plastico ? '0' : number_format($capacidadRefugio - $recursos->plastico, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->ceramica ? '0' : number_format($capacidadRefugio - $recursos->ceramica, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->liquido ? '0' : number_format($capacidadRefugio - $recursos->liquido, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->micros ? '0' : number_format($capacidadRefugio - $recursos->micros, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->fuel ? '0' : number_format($capacidadRefugio - $recursos->fuel, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->ma ? '0' : number_format($capacidadRefugio - $recursos->ma, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->municion ? '0' : number_format($capacidadRefugio - $recursos->municion, 0, ',', '.') }}
                            </td>
                            <td class="anchofijo text-light borderless">
                                {{ $capacidadRefugio < $recursos->creditos ? '0' : number_format($capacidadRefugio - $recursos->creditos, 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
    </script>
@endsection
