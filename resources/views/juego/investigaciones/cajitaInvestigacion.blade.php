<div class="row rounded cajita">
    <div class="col-12">
        <div id="cuadro1" class="table-responsive">
            <table class="table table-borderless borderless table-sm text-center anchofijo"
                style="margin-top: 5px !important">
                <tr>
                    <td colspan="4" class="text-success text-center borderless align-middle">
                        {{ trans('investigacion.' . $investigacion->codigo) }} nivel {{ $investigacion->nivel
                            }} (de 90)
                        <span class="text-warning">
                            {{ count($investigacion->eninvestigaciones) > 0 ? 'En cola nivel: ' . $investigacion->eninvestigaciones[count($investigacion->eninvestigaciones) - 1]->nivel : '' }}
                        </span>
                    </td>
                    <td colspan="3" class="text-success text-center borderless align-middle"
                        id="{{ 'termina' . $investigacion->codigo }}">Termina:</td>
                    <td colspan="3" class="text-success text-center borderless align-middle"
                        id="{{ 'tiempo' . $investigacion->codigo }}">Tiempo:</td>
                    <td colspan="2" class="text-success text-right borderless align-middle">
                        <input id="{{ 'personal' . $investigacion->codigo }}" type="number" class="personal1 input"
                            placeholder="personal" value="{{number_format($personal, 0,"","")}}"
                            onkeyup="calculaTiempoInvestigacion({{ $costeInv->mineral+$costeInv->cristal+$costeInv->gas+$costeInv->plastico +$costeInv->ceramica+
                            $costeInv->liquido + $costeInv->micros + $costeInv->fuel+ $costeInv->ma+ $costeInv->municion }},{{$velInvest->valor}},
                            '{{$investigacion->codigo}}','{{!empty($investigacion->enInvestigaciones[0]->nivel) ? $investigacion->enInvestigaciones[count($investigacion->enInvestigaciones)-1]->nivel+1 : $investigacion->nivel+1}}','{{$nivelLaboratorio->nivel}}') ">
                    </td>
                </tr>
                <tr>
                    <td rowspan="4" class="anchofijo text-warning borderless"><img class="rounded"
                            src="{{ asset('img/juego/skin0/investigaciones/' . $investigacion->codigo . '.jpg') }}"
                            width="90" height="90"></td>
                    <td colspan="11" class="borderless">&nbsp;</td>
                </tr>
                <tr>
                    <td class="anchofijo {{ $costeInv->mineral == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Mineral</td>
                    <td class="anchofijo {{ $costeInv->cristal == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        cristal</td>
                    <td class="anchofijo {{ $costeInv->gas == 0 ? 'text-muted' : 'text-warning' }} borderless">Gas</td>
                    <td class="anchofijo {{ $costeInv->plastico == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Plástico</td>
                    <td class="anchofijo {{ $costeInv->ceramica == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Cerámica</td>
                    <td class="anchofijo {{ $costeInv->liquido == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Liquido</td>
                    <td class="anchofijo {{ $costeInv->micros == 0 ? 'text-muted' : 'text-warning' }} borderless">Micros
                    </td>
                    <td class="anchofijo {{ $costeInv->fuel == 0 ? 'text-muted' : 'text-warning' }} borderless">Fuel
                    </td>
                    <td class="anchofijo {{ $costeInv->ma == 0 ? 'text-muted' : 'text-warning' }} borderless">M-A</td>
                    <td class="anchofijo {{ $costeInv->municion == 0 ? 'text-muted' : 'text-warning' }} borderless">
                        Munición</td>
                    <td class="anchofijo text-muted borderless">Personal</td>
                </tr>
                <tr>
                    @php
                    $error = false;
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->mineral > 0) {
                    if ($costeInv->mineral > $recursos->mineral) {
                    $clase = 'danger';
                    $coste = $costeInv->mineral;
                    $error = true;
                    }else {
                    $coste = $costeInv->mineral;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->cristal > 0) {
                    if ($costeInv->cristal > $recursos->cristal) {
                    $clase = 'danger';
                    $coste = $costeInv->cristal;
                    $error = true;
                    }else {
                    $coste = $costeInv->cristal;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->gas > 0) {
                    if ($costeInv->gas > $recursos->gas) {
                    $clase = 'danger';
                    $coste = $costeInv->gas;
                    $error = true;
                    }else {
                    $coste = $costeInv->gas;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->plastico > 0) {
                    if ($costeInv->plastico > $recursos->plastico) {
                    $clase = 'danger';
                    $coste = $costeInv->plastico;
                    $error = true;
                    }else {
                    $coste = $costeInv->plastico;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->ceramica > 0) {
                    if ($costeInv->ceramica > $recursos->ceramica) {
                    $clase = 'danger';
                    $coste = $costeInv->ceramica;
                    }else {
                    $coste = $costeInv->ceramica;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->liquido > 0) {
                    if ($costeInv->liquido > $recursos->liquido) {
                    $clase = 'danger';
                    $coste = $costeInv->liquido;
                    $error = true;
                    }else {
                    $coste = $costeInv->liquido;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->micros > 0) {
                    if ($costeInv->micros > $recursos->micros) {
                    $clase = 'danger';
                    $coste = $costeInv->micros;
                    $error = true;
                    }else {
                    $coste = $costeInv->micros;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->fuel > 0) {
                    if ($costeInv->fuel > $recursos->fuel) {
                    $clase = 'danger';
                    $coste = $costeInv->fuel;
                    $error = true;
                    }else {
                    $coste = $costeInv->fuel;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->ma > 0) {
                    if ($costeInv->ma > $recursos->ma) {
                    $clase = 'danger';
                    $coste = $costeInv->ma;
                    $error = true;
                    }else {
                    $coste = $costeInv->ma;
                    }
                    }
                    @endphp
                    <td class="anchofijo text-{{ $clase }} borderless">
                        {{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->municion > 0) {
                    if ($costeInv->municion > $recursos->municion) {
                    $clase = 'danger';
                    $coste = $costeInv->municion;
                    $error = true;
                    }else {
                    $coste = $costeInv->municion;
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
                    if ($costeInv->mineral > 0) {
                    if ($costeInv->mineral > $recursos->mineral) {
                    $clase = 'danger';
                    $coste = $recursos->mineral - $costeInv->mineral;
                    }else {
                    $coste = $recursos->mineral - $costeInv->mineral;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->cristal > 0) {
                    if ($costeInv->cristal > $recursos->cristal) {
                    $clase = 'danger';
                    $coste = $recursos->cristal - $costeInv->cristal;
                    }else {
                    $coste = $recursos->cristal - $costeInv->cristal;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->gas > 0) {
                    if ($costeInv->gas > $recursos->gas) {
                    $clase = 'danger';
                    $coste = $recursos->gas - $costeInv->gas;
                    }else {
                    $coste = $recursos->gas - $costeInv->gas;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->plastico > 0) {
                    if ($costeInv->plastico > $recursos->plastico) {
                    $clase = 'danger';
                    $coste = $recursos->plastico - $costeInv->plastico;
                    }else {
                    $coste = $recursos->plastico - $costeInv->plastico;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->ceramica > 0) {
                    if ($costeInv->ceramica > $recursos->ceramica) {
                    $clase = 'danger';
                    $coste = $recursos->ceramica - $costeInv->ceramica;
                    }else {
                    $coste = $recursos->ceramica - $costeInv->ceramica;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->liquido > 0) {
                    if ($costeInv->liquido > $recursos->liquido) {
                    $clase = 'danger';
                    $coste = $recursos->liquido - $costeInv->liquido;
                    }else {
                    $coste = $recursos->liquido - $costeInv->liquido;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->micros > 0) {
                    if ($costeInv->micros > $recursos->micros) {
                    $clase = 'danger';
                    $coste = $recursos->micros - $costeInv->micros;
                    }else {
                    $coste = $recursos->micros - $costeInv->micros;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->fuel > 0) {
                    if ($costeInv->fuel > $recursos->fuel) {
                    $clase = 'danger';
                    $coste = $recursos->fuel - $costeInv->fuel;
                    }else {
                    $coste = $recursos->fuel - $costeInv->fuel;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->ma > 0) {
                    if ($costeInv->ma > $recursos->ma) {
                    $clase = 'danger';
                    $coste = $recursos->ma - $costeInv->ma;
                    }else {
                    $coste = $recursos->ma - $costeInv->ma;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
                    </td>
                    @php
                    $clase = 'light';
                    $coste = '';
                    if ($costeInv->municion > 0) {
                    if ($costeInv->municion > $recursos->municion) {
                    $clase = 'danger';
                    $coste = $recursos->municion - $costeInv->municion;
                    }else {
                    $coste = $recursos->municion - $costeInv->municion;
                    }
                    }
                    @endphp
                    <td class="text-{{ $clase }} borderless">
                        <small>{{ $coste == '' ? $coste : number_format($coste, 0,",",".") }}</small>
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
                        //Posible boton de proto
                        @endphp
                        <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal"
                            data-target="#datosModal" onclick="mostrarDatosInvestigacion('{{$investigacion->codigo}}')">
                            <i class="fa fa-question"></i> nombre prototipo desbloqueado
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-block btn-sm " data-toggle="modal"
                            data-target="#datosModal" onclick="mostrarDatosInvestigacion('{{$investigacion->codigo}}')">
                            <i class="fa fa-info-circle"></i> Datos
                        </button>
                    </td>
                    <td>
                        @php
                        $deshabilitado="";
                        $clase="success";
                        $texto=" Investigar";
                        if ($nivelLaboratorio->nivel>0){
                        foreach ($dependencias as $dependencia) {
                        if ($dependencia->codigo==$investigacion->codigo){
                        $nivelTengo=$investigaciones->where('codigo',$dependencia->codigoRequiere)->first();
                        if ( $nivelTengo->nivel < $dependencia->nivelRequiere){
                            $texto.=" requiere ".trans('investigacion.' . $dependencia->codigoRequiere)." nivel
                            ".$dependencia->nivelRequiere;
                            $deshabilitado=" disabled='disabled' ";
                            $clase="light";
                            }
                            }
                            }
                            } else {
                            $texto.=" requiere Centro de investigación en este planeta";
                            $deshabilitado=" disabled='disabled' ";
                            $clase="light";
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
                            <button type="button" class="btn btn-outline-{{$clase}} btn-block btn-sm" {{$deshabilitado}}
                                onclick="sendInvestigar('{{ $investigacion->id }}', '{{ $investigacion->codigo }}')">
                                <i class="fa fa-arrow-alt-circle-up "></i> {{$texto}}
                            </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
