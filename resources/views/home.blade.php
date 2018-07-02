@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="alert alert-dark" role="alert" style="margin-top: 100px">
        <h4 class="alert-heading text-center">Universo principal</h4>
        <p>
            Este universo tiene los parametros estandar
        </p>
        <hr>
        <table class="table table-striped table-secondary table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Opcion</th>
                    <th scope="col">Configuracion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Creacion del universo</th>
                    <td>01/01/2019</td>
                </tr>
                <tr>
                    <th scope="row">Fecha de finalizacion del universo (prevista)</th>
                    <td>01/01/2020</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p class="mb-0">
            <button type="button" class="btn btn-dark" onclick="location.href='{{ url('/juego') }}';">
                Entrar
            </button>
        </p>
    </div>
    <div class="alert alert-dark" role="alert">
        <h4 class="alert-heading text-center">Universo Mutante</h4>
        <p>
            Este universo tiene los parametros alterados
        </p>
        <hr>
        <table class="table table-striped table-secondary table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Opcion</th>
                    <th scope="col">Configuracion</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Velocidad construccion</th>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row">Velocidad investigacion</th>
                    <td>5</td>
                </tr>
                <tr>
                    <th scope="row">Velocidad fabricas</th>
                    <td>15</td>
                </tr>
                <tr>
                    <th scope="row">Creacion del universo</th>
                    <td>01/02/2019</td>
                </tr>
                <tr>
                    <th scope="row">Fecha de finalizacion del universo (prevista)</th>
                    <td>28/02/2020</td>
                </tr>
            </tbody>
        </table>
        <hr>
        <p class="mb-0">
            <button type="button" class="btn btn-dark" onclick="location.href='{{ url('/juego') }}';">
                Entrar
            </button>
        </p>
    </div>
</div>
@endsection