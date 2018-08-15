@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @include ('juego.diseñar.tablaResumenDiseños', [
                'diseño' => $diseño,
            ])
            @include ('juego.diseñar.tablaArmas', [
                'diseño' => $diseño,
                'investigaciones'=>$investigaciones,
                'armas'=>$armas,
                'constantesI'=>$constantesI,
                'costesArmas'=>$costesArmas,
            ])
            @include ('juego.diseñar.tablaDaños', [
                'diseño' => $diseño,
            ])
        </div>
    </div>
@endsection