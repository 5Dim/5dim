@extends('juego.recursosFrame')
@section('content')
<div class="container-fluid">
    <div class="container-fluid">
        <nav>
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link active" id="colonia-tab" data-toggle="tab" href="#colonia" role="tab" aria-controls="colonia" aria-selected="true">
                    Colonia
                </a>
                <a class="nav-item nav-link" id="ligeras-tab" data-toggle="tab" href="#ligeras" role="tab" aria-controls="ligeras" aria-selected="false">
                    Imperio
                </a>
                <a class="nav-item nav-link" id="refugio-tab" data-toggle="tab" href="#refugio" role="tab" aria-controls="refugio" aria-selected="false">
                    Refugio
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <table class="table table-sm table-borderless text-center anchofijo">
                <tr>
                    <th colspan="4" class="anchofijo text-success borderless">
                        <big>Resumen de la colonia</big>
                    </th>
                </tr>
                <td class="anchofijo text-secondary borderless">
                    <div class="input-group mb-3 borderless" style="padding-left: 10px !important; padding-right: 5px !important">
                        <div class="input-group-append">
                            <span class="input-group-text bg-dark text-light">Nombre de la colonia</span>
                        </div>
                        <input type="text" class="form-control input" placeholder="Nombre de la colonia" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                </td>
                <td class="anchofijo text-secondary borderless">
                    <div class="input-group mb-3 borderless" style="padding-left: 5px !important; padding-right: 5px !important">
                        <div class="input-group-append">
                            <span class="input-group-text bg-dark text-light">Ceder colonia</span>
                        </div>
                        <input type="text" class="form-control input" placeholder="Ceder colonia a" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosConstruccion('')">
                        <i class="fa fa-save"></i> Guardar cambios
                    </button>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosConstruccion('')">
                        <i class="fa fa-times-circle"></i> Abandonar colonia
                    </button>
                </td>
            </table>
            <table class="table table-sm table-borderless text-center anchofijo">
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
                        Produccion por hora
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[0]->personal, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[1]->mineral, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[2]->cristal, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[3]->gas, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[4]->plastico, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[5]->ceramica, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[6]->liquido, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[7]->micros, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[8]->fuel, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[9]->ma, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-success borderless">
                        {{ number_format($produccionesSinCalcular[10]->municion, 0,",",".") }}
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Liquidos
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-danger borderless">
                        -{{ number_format($producciones[6]->liquido * $constantes->where('codigo', 'costoLiquido')->first()->valor, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Micros
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-danger borderless">
                        -{{ number_format($produccionesSinCalcular[7]->micros*$constantes->where('codigo', 'costoMicros')->first()->valor, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Fuel
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-danger borderless">
                        -{{ number_format($produccionesSinCalcular[8]->fuel*$constantes->where('codigo', 'costoFuel')->first()->valor, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        MA
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-danger borderless">
                        -{{ number_format($produccionesSinCalcular[9]->ma * $constantes->where('codigo', 'costoMa')->first()->valor, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-warning borderless">
                        Municion
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-danger borderless">
                        -{{ number_format($produccionesSinCalcular[10]->municion * $constantes->where('codigo', 'costoMunicion')->first()->valor, 0,",",".") }}
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                    <td class="anchofijo text-light borderless">
                        0
                    </td>
                </tr>
                <tr>
                    <td class="anchofijo text-primary borderless">
                        Totales
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[0]->personal, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[1]->mineral, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[2]->cristal, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[3]->gas, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[4]->plastico, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[5]->ceramica, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[6]->liquido, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[7]->micros, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[8]->fuel, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[9]->ma, 0,",",".") }}
                    </td>
                    <td class="text-primary borderless">
                        {{ number_format($producciones[10]->municion, 0,",",".") }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="datosModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="ModalTitulo"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body" id="datosContenido">
        ...
        </div>
        <div class="modal-footer">
        </div>
    </div>
    </div>
</div>

<script>
</script>
@endsection