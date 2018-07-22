<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                    <tr>
                        <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('construccion.' . $construccion->codigo) }} nivel {{ $construccion->nivel
                            }} (de 90)
                            <span class="text-warning">
                                {{ count($construccion->enConstrucciones) > 0 ? 'En cola nivel: ' . $construccion->enConstrucciones[count($construccion->enConstrucciones) - 1]->nivel : '' }}
                            </span>
                        </td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $construccion->codigo }}">Termina:</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $construccion->codigo }}">Tiempo:</td>
                        <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $construccion->codigo }}" type="number" class="personal1"
                                placeholder="personal" value="{{$personal}}" onkeyup="calculaTiempo({{$construccion->coste->mineral+$construccion->coste->cristal+$construccion->coste->gas+$construccion->coste->plastico +$construccion->coste->ceramica +$construccion->coste->liquido + $construccion->coste->micros +12}} ,{{$velocidadConst->valor}}, '{{$construccion->codigo}}') "></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless">
                            <img class="rounded" src="{{ asset('img/juego/skin0/edificios/' . $construccion->codigo . '.jpg') }}" width="90" height="90">
                        </td>
                        <td colspan="11" class="borderless">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $construccion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                        <td class="anchofijo {{ $construccion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                        <td class="anchofijo {{ $construccion->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                        <td class="anchofijo {{ $construccion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                        <td class="anchofijo {{ $construccion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                        <td class="anchofijo {{ $construccion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                        <td class="anchofijo {{ $construccion->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                        <td class="anchofijo text-muted borderless">Fuel</td>
                        <td class="anchofijo text-muted borderless">M-A</td>
                        <td class="anchofijo text-muted borderless">Munición</td>
                        <td class="anchofijo text-muted borderless">Personal</td>
                    </tr>
                    <tr>
                        @php
                            $error = false;
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->mineral > 0) {
                                if ($construccion->coste->mineral > $recursos->mineral) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->mineral;
                                    $error = true;
                                }else {
                                    $coste = $construccion->coste->mineral;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->cristal > 0) {
                                if ($construccion->coste->cristal > $recursos->cristal) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->cristal;
                                    $error = true;
                                }else {
                                    $coste = $construccion->coste->cristal;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->gas > 0) {
                                if ($construccion->coste->gas > $recursos->gas) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->gas;
                                    $error = true;
                                }else {
                                    $coste = $construccion->coste->gas;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->plastico > 0) {
                                if ($construccion->coste->plastico > $recursos->plastico) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->plastico;
                                    $error = true;
                                }else {
                                    $coste = $construccion->coste->plastico;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->ceramica > 0) {
                                if ($construccion->coste->ceramica > $recursos->ceramica) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->ceramica;
                                }else {
                                    $coste = $construccion->coste->ceramica;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->liquido > 0) {
                                if ($construccion->coste->liquido > $recursos->liquido) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->liquido;
                                    $error = true;
                                }else {
                                    $coste = $construccion->coste->liquido;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($construccion->coste->micros > 0) {
                                if ($construccion->coste->micros > $recursos->micros) {
                                    $clase = 'danger';
                                    $coste = $construccion->coste->micros;
                                    $error = true;
                                }else {
                                    $coste = $construccion->coste->micros;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                        <td class="anchofijo text-muted borderless"></td>
                    </tr>
                    <tr>
                        {{--@if () premium --}}
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->mineral > 0) {
                                    if ($construccion->coste->mineral > $recursos->mineral) {
                                        $clase = 'danger';
                                        $coste = $recursos->mineral - $construccion->coste->mineral;
                                    }else {
                                        $coste = $recursos->mineral - $construccion->coste->mineral;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->cristal > 0) {
                                    if ($construccion->coste->cristal > $recursos->cristal) {
                                        $clase = 'danger';
                                        $coste = $recursos->cristal - $construccion->coste->cristal;
                                    }else {
                                        $coste = $recursos->cristal - $construccion->coste->cristal;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->gas > 0) {
                                    if ($construccion->coste->gas > $recursos->gas) {
                                        $clase = 'danger';
                                        $coste = $recursos->gas - $construccion->coste->gas;
                                    }else {
                                        $coste = $recursos->gas - $construccion->coste->gas;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->plastico > 0) {
                                    if ($construccion->coste->plastico > $recursos->plastico) {
                                        $clase = 'danger';
                                        $coste = $recursos->plastico - $construccion->coste->plastico;
                                    }else {
                                        $coste = $recursos->plastico - $construccion->coste->plastico;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->ceramica > 0) {
                                    if ($construccion->coste->ceramica > $recursos->ceramica) {
                                        $clase = 'danger';
                                        $coste = $recursos->ceramica - $construccion->coste->ceramica;
                                    }else {
                                        $coste = $recursos->ceramica - $construccion->coste->ceramica;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->liquido > 0) {
                                    if ($construccion->coste->liquido > $recursos->liquido) {
                                        $clase = 'danger';
                                        $coste = $recursos->liquido - $construccion->coste->liquido;
                                    }else {
                                        $coste = $recursos->liquido - $construccion->coste->liquido;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($construccion->coste->micros > 0) {
                                    if ($construccion->coste->micros > $recursos->micros) {
                                        $clase = 'danger';
                                        $coste = $recursos->micros - $construccion->coste->micros;
                                    }else {
                                        $coste = $recursos->micros - $construccion->coste->micros;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            <td class="borderless">
                                &nbsp;
                            </td>
                            <td class="borderless">
                                &nbsp;
                            </td>
                            <td class="borderless">
                                &nbsp;
                            </td>
                            <td class="borderless">
                                &nbsp;
                            </td>
                        {{--@endif--}}
                    </tr>
                </table>
            </div>
        </div>
        <div class="col-12 borderless">
            <div id="cuadro1" class="table-responsive ">
                <table class="table table-sm table-borderless text-center anchofijo">
                    <tr>
                        <td>
                            @php
                                $deshabilitado="";
                                $clase="danger";
                                if (!empty($construccion->enConstrucciones[0])) {
                                    if ($construccion->enConstrucciones[0]->accion == "Construyendo") {
                                        $deshabilitado=" disabled='disabled' ";
                                        $clase="light";
                                    }
                                }
                                if ($construccion->nivel < 1) {
                                    $deshabilitado=" disabled='disabled' ";
                                    $clase="light";
                                }
                            @endphp
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" {{$deshabilitado}} onclick="sendReciclar('{{ $construccion->id }}', '{{ $construccion->codigo }}')">
                                <i class="fa fa-trash"></i> Reciclar
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosConstruccion('{{$construccion->codigo}}')">
                                <i class="fa fa-info-circle"></i> Datos
                            </button>
                        </td>
                        @if (substr($construcciones[$i]->codigo, 0, 3) == 'ind' and substr($construcciones[$i]->codigo, 3) != 'Personal')
                            <td>
                                @php
                                    $industria = "";
                                    if (substr($construcciones[$i]->codigo, 0, 3) == 'ind') {
                                        $industria = substr($construcciones[$i]->codigo, 3);
                                    }
                                @endphp
                                <button type="button" class="btn btn-outline-primary btn-block btn-sm" onclick="sendIndustria('{{ strtolower($industria) }}')">
                                    <i class="fa fa-play"></i> Producir
                                </button>
                            </td>
                        @endif
                        <td>
                            @php
                                $deshabilitado="";
                                $clase="success";
                                $texto=" Construir";
                                foreach ($dependencias as $dependencia) {
                                    if ($dependencia->codigo==$construccion->codigo){
                                            $nivelTengo=$construcciones->where('codigo',$dependencia->codigoRequiere)->first();
                                        if ( $nivelTengo->nivel < $dependencia->nivelRequiere){
                                            $texto.=" requiere ".trans('construccion.' .  $dependencia->codigoRequiere)." nivel ".$dependencia->nivelRequiere;
                                            $deshabilitado=" disabled='disabled' ";
                                            $clase="light";
                                        }
                                    }
                                }
                                if (!empty($construccion->enConstrucciones[0])) {
                                    if ($construccion->enConstrucciones[0]->accion == "Reciclando") {
                                        $deshabilitado=" disabled='disabled' ";
                                        $clase="light";
                                    }
                                }
                                if ($error) {
                                    $deshabilitado=" disabled='disabled' ";
                                    $clase="light";
                                }
                            @endphp
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" {{$deshabilitado}} onclick="sendConstruir('{{ $construccion->id }}', '{{ $construccion->codigo }}', '{{ $tab }}')">
                                <i class="fa fa-arrow-alt-circle-up "></i> {{$texto}}
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>