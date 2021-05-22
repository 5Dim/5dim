@extends('principal.layout')

@section('content')
    <div class="container">
        <div class="alert alert-dark" role="alert" style="margin-top: 100px">
            <h2 class="text-center fs-1">Ronda 2022</h2>
            <hr>
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Opcion</th>
                        <th scope="col">Configuracion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Creación del universo</th>
                        <td>01/01/2022</td>
                    </tr>
                    <tr>
                        <th scope="row">Fecha de finalización del universo (prevista)</th>
                        <td>30/12/2022</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <p class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="btn btn-dark me-md-2" onclick="location.href='{{ url('/juego/construccion') }}'">
                    Entrar
                </button>
            </p>
        </div>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer
                so that you can see how spacing within an alert works with this kind of content.</p>
        </div>
        <div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer
                so that you can see how spacing within an alert works with this kind of content.</p>
        </div>
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer
                so that you can see how spacing within an alert works with this kind of content.</p>
        </div>
    </div>
@endsection
