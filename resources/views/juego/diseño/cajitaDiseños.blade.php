<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                    <tr>
                        <th colspan="11" class="text-success text-center borderless align-middle">
                            <big>Modelo: {{ $diseño->nombre }}<big>
                        </th>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless">
                            <img class="rounded" data-skin="1" src="{{ asset('img/fotos naves/skin1/naveMT1.jpg') }}" width="180" height="119">
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Ataque
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Defensa
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Velocidad
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Consumo
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Municion
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Mantenimiento
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Carga
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Hangar cazas
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Hangar ligeras
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Hangar medias
                        </td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->ataque > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->ataque }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->defensa > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->defensa }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->velocidad > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->velocidad }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->fuel > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->fuel }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->municion > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->municion }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->mantenimiento > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->mantenimiento }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->carga > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->carga }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->cargaPequeña > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->cargaPequeña }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->cargaMediana > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->cargaMediana }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->cargaGrande > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->cargaGrande }}
                        </td>
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
                            Hangar pesadas
                        </td>
                        <td class="anchofijo text-warning borderless">
                            Hangar estaciones
                        </td>
                    </tr>
                    <tr>
                        <td class="anchofijo text-{{ $diseño->costes->mineral > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->mineral }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->cristal > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->cristal }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->gas > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->gas }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->plastico > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->plastico }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->ceramica > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->ceramica }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->liquido > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->liquido }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->micros > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->micros }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->costes->personal > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->costes->personal }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->cargaEnorme > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->cargaEnorme }}
                        </td>
                        <td class="anchofijo text-{{ $diseño->viewDiseños->cargaMega > 0 ? 'light' : 'muted' }} borderless">
                            {{ $diseño->viewDiseños->cargaMega }}
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12">
            <div id="cuadro1" class="table-responsive ">
                <table class="table table-sm table-borderless text-center anchofijo">
                    <tr>
                        <td>
                            <button type="button" class="btn btn-outline-danger btn-block btn-sm ">
                                <i class="fa fa-info-circle"></i> Reciclar nave
                            </button>
                        </td>
                        <td class="anchofijo text-secondary borderless">
                            <div class="input-group mb-3 input-group-sm borderless">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-dark text-light">
                                        <button type="button" class="btn btn-dark btn-sm text-warning" onclick="reciclarDiseño({{ $diseño->id }})">
                                            0
                                        </button>
                                    </span>
                                </div>
                                <input type="text" class="form-control input" value="0" aria-label="" aria-describedby="basic-addon2" id="diseño{{ $diseño->id }}">
                                <div class="input-group-append">
                                    <span class="input-group-text bg-dark text-light">
                                        <button type="button" class="btn btn-dark btn-sm text-warning">
                                            M
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-block btn-sm" onclick="construirDiseño({{ $diseño->id }})">
                                <i class="fa fa-plus-circle"></i> Construir
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a type="button" class="btn btn-outline-danger btn-block btn-sm text-danger" href="{{ url('juego/diseño/borrarDiseño/' . $diseño->id) }}">
                                <i class="fa fa-times "></i> Borrar diseño
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                <i class="fa fa-info-circle"></i> Datos
                            </button>
                        </td>
                        <td>
                            <a type="button" class="btn btn-outline-success btn-block btn-sm text-success" href="{{ url('juego/diseño/editarDiseño/' . $diseño->id) }}">
                                <i class="fa fa-edit"></i> Editar diseño
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>