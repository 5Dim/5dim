<div class="row rounded cajita">
        <div class="col-12">
            <div id="cuadro1" class="table-responsive-sm">
                <table class="table table-borderless borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                    <tr>
                        <td colspan="4" class="text-success text-center borderless align-middle">{{ trans('investigacion.' . $investigacion->codigo) }} nivel {{ $investigacion->nivel
                            }} (de 90)
                            <span class="text-warning">
                                {{ count($investigacion->eninvestigaciones) > 0 ? 'En cola nivel: ' . $investigacion->eninvestigaciones[count($investigacion->eninvestigaciones) - 1]->nivel : '' }}
                            </span>
                        </td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'termina' . $investigacion->codigo }}">Termina:</td>
                        <td colspan="3" class="text-success text-center borderless align-middle" id="{{ 'tiempo' . $investigacion->codigo }}">Tiempo:</td>
                        <td colspan="2" class="text-success text-right borderless align-middle"><input id="{{ 'personal' . $investigacion->codigo }}" type="number" class="personal1"
                                placeholder="personal" value="{{$personal}}" onkeyup="calculaTiempo({{$investigacion->coste->mineral+$investigacion->coste->cristal+$investigacion->coste->gas+$investigacion->coste->plastico +$investigacion->coste->ceramica +$investigacion->coste->liquido + $investigacion->coste->micros +12}} ,{{$velInvest->valor}}, '{{$investigacion->codigo}}') "></td>
                    </tr>
                    <tr>
                        <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded" src="{{ asset('img/juego/skin0/investigaciones/' . $investigacion->codigo . '.jpg') }}"
                                width="90" height="90"></td>
                        <td colspan="11" class="borderless">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="anchofijo {{ $investigacion->coste->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">Mineral</td>
                        <td class="anchofijo {{ $investigacion->coste->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">cristal</td>
                        <td class="anchofijo {{ $investigacion->coste->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                        <td class="anchofijo {{ $investigacion->coste->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">Plástico</td>
                        <td class="anchofijo {{ $investigacion->coste->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">Cerámica</td>
                        <td class="anchofijo {{ $investigacion->coste->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">Liquido</td>
                        <td class="anchofijo {{ $investigacion->coste->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros</td>
                        <td class="anchofijo {{ $investigacion->coste->fuel == 0 ? 'text-muted' : 'text-warning' }} borderless">Fuel</td>
                        <td class="anchofijo {{ $investigacion->coste->ma == 0 ? 'text-muted' : 'text-warning' }} borderless">M-A</td>
                        <td class="anchofijo {{ $investigacion->coste->municion == 0 ? 'text-muted' : 'text-warning' }} borderless">Munición</td>
                        <td class="anchofijo text-muted borderless">Personal</td>
                    </tr>
                    <tr>
                        @php
                            $error = false;
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->mineral > 0) {
                                if ($investigacion->coste->mineral > $recursos->mineral) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->mineral;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->mineral;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->cristal > 0) {
                                if ($investigacion->coste->cristal > $recursos->cristal) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->cristal;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->cristal;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->gas > 0) {
                                if ($investigacion->coste->gas > $recursos->gas) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->gas;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->gas;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->plastico > 0) {
                                if ($investigacion->coste->plastico > $recursos->plastico) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->plastico;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->plastico;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->ceramica > 0) {
                                if ($investigacion->coste->ceramica > $recursos->ceramica) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->ceramica;
                                }else {
                                    $coste = $investigacion->coste->ceramica;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->liquido > 0) {
                                if ($investigacion->coste->liquido > $recursos->liquido) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->liquido;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->liquido;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->micros > 0) {
                                if ($investigacion->coste->micros > $recursos->micros) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->micros;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->micros;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->fuel > 0) {
                                if ($investigacion->coste->fuel > $recursos->fuel) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->fuel;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->fuel;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->ma > 0) {
                                if ($investigacion->coste->ma > $recursos->ma) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->ma;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->ma;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        @php
                            $clase = 'light';
                            $coste = '';
                            if ($investigacion->coste->municion > 0) {
                                if ($investigacion->coste->municion > $recursos->municion) {
                                    $clase = 'danger';
                                    $coste = $investigacion->coste->municion;
                                    $error = true;
                                }else {
                                    $coste = $investigacion->coste->municion;
                                }
                            }
                        @endphp
                        <td class="anchofijo text-{{ $clase }} borderless">
                            {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                        </td>
                        <td class="anchofijo text-muted borderless"></td>
                    </tr>
                    <tr>
                        {{--@if () premium --}}
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->mineral > 0) {
                                    if ($investigacion->coste->mineral > $recursos->mineral) {
                                        $clase = 'danger';
                                        $coste = $recursos->mineral - $investigacion->coste->mineral;
                                    }else {
                                        $coste = $recursos->mineral - $investigacion->coste->mineral;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->cristal > 0) {
                                    if ($investigacion->coste->cristal > $recursos->cristal) {
                                        $clase = 'danger';
                                        $coste = $recursos->cristal - $investigacion->coste->cristal;
                                    }else {
                                        $coste = $recursos->cristal - $investigacion->coste->cristal;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->gas > 0) {
                                    if ($investigacion->coste->gas > $recursos->gas) {
                                        $clase = 'danger';
                                        $coste = $recursos->gas - $investigacion->coste->gas;
                                    }else {
                                        $coste = $recursos->gas - $investigacion->coste->gas;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->plastico > 0) {
                                    if ($investigacion->coste->plastico > $recursos->plastico) {
                                        $clase = 'danger';
                                        $coste = $recursos->plastico - $investigacion->coste->plastico;
                                    }else {
                                        $coste = $recursos->plastico - $investigacion->coste->plastico;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->ceramica > 0) {
                                    if ($investigacion->coste->ceramica > $recursos->ceramica) {
                                        $clase = 'danger';
                                        $coste = $recursos->ceramica - $investigacion->coste->ceramica;
                                    }else {
                                        $coste = $recursos->ceramica - $investigacion->coste->ceramica;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->liquido > 0) {
                                    if ($investigacion->coste->liquido > $recursos->liquido) {
                                        $clase = 'danger';
                                        $coste = $recursos->liquido - $investigacion->coste->liquido;
                                    }else {
                                        $coste = $recursos->liquido - $investigacion->coste->liquido;
                                    }
                                }
                            @endphp
                            <td class="text-{{ $clase }} borderless">
                                <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                            </td>
                            @php
                                $clase = 'light';
                                $coste = '';
                                if ($investigacion->coste->micros > 0) {
                                    if ($investigacion->coste->micros > $recursos->micros) {
                                        $clase = 'danger';
                                        $coste = $recursos->micros - $investigacion->coste->micros;
                                    }else {
                                        $coste = $recursos->micros - $investigacion->coste->micros;
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
            <div id="cuadro1" class="table-responsive-sm ">
                <table class="table table-sm table-borderless text-center anchofijo">
                    <tr>
                        <td>
                            @php
                                //Posible boton de proto
                            @endphp
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosinvestigacion('{{$investigacion->codigo}}')">
                                    <i class="fa fa-question"></i> nombre prototipo desbloqueado
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal" data-target="#datosModal" onclick="mostrarDatosinvestigacion('{{$investigacion->codigo}}')">
                                <i class="fa fa-info-circle"></i> Datos
                            </button>
                        </td>
                        <td>
                            @php
                                $deshabilitado="";
                                $clase="success";
                                $texto=" Investigar";
                                foreach ($dependencias as $dependencia) {
                                    if ($dependencia->codigo==$investigacion->codigo){
                                            $nivelTengo=$investigaciones->where('codigo',$dependencia->codigoRequiere)->first();
                                        if ( $nivelTengo->nivel < $dependencia->nivelRequiere){
                                            $texto.=" requiere ".trans('investigacion.' .  $dependencia->codigoRequiere)." nivel ".$dependencia->nivelRequiere;
                                            $deshabilitado=" disabled='disabled' ";
                                            $clase="light";
                                        }
                                    }
                                }
                                if (!empty($investigacion->eninvestigaciones[0])) {
                                    if ($investigacion->eninvestigaciones[0]->accion == "Reciclando") {
                                        $deshabilitado=" disabled='disabled' ";
                                        $clase="light";
                                    }
                                }
                                if ($error) {
                                    $deshabilitado=" disabled='disabled' ";
                                    $clase="light";
                                }
                            @endphp
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" {{$deshabilitado}} onclick="sendConstruir('{{ $investigacion->id }}', '{{ $investigacion->codigo }}','minas-tab')">
                                <i class="fa fa-arrow-alt-circle-up "></i> {{$texto}}
                            </button>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>