@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @include ('juego.diseniar.tablaResumenDisenios', [
            'disenio' => $disenio,
            ])
            @include ('juego.diseniar.tablaArmas', [
            'disenio' => $disenio,
            'investigaciones'=>$investigaciones,
            'armas'=>$armas,
            'constantesI'=>$constantesI,
            'costesArmas'=>$costesArmas,
            'arrayAlcance'=>$arrayAlcance,
            'arrayDispersion'=>$arrayDispersion,
            'arrayEnergiaArmas'=>$arrayEnergiaArmas,
            'arrayObjetos'=>$arrayObjetos,
            'esteDisenio'=>$esteDisenio
            ])
            @include ('juego.diseniar.tablaDanios', [
            'disenio' => $disenio,
            ])
        </div>
    </div>
@endsection
