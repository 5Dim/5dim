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
            <p class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-dark me-md-2" onclick="location.href='{{ url('/jugador/0') }}';">
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
            <p class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-dark me-md-2" onclick="location.href='{{ url('/jugador/1') }}';">
                    Entrar
                </button>
            </p>
        </div>
    </div>
@endsection
