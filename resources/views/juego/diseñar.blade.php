@extends('juego.recursosFrame')

@section('content')
    <div class="container-fluid">
        <div class="container-fluid">
            @include ('juego.tablaResumenDiseños', [
                'diseño' => $diseño,
            ])
            @include ('juego.tablaArmas', [
                'diseño' => $diseño,
                'investigaciones'=>$investigaciones,
                'armas'=>$armas,
                'constantesI'=>$constantesI,
            ])
            @include ('juego.tablaDaños', [
                'diseño' => $diseño,
            ])
        </div>
    </div>
@endsection