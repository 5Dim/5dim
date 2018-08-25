@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container">
            <div class="col-12 rounded cajita">
                <div id="cuadro1" class="table-responsive">
                    <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                        <tr>
                            <th colspan="2" class="anchofijo text-success">
                                <big>
                                    Crear alianza
                                </big>
                            </th>
                        </tr>
                        <tr>
                            <td class="anchofijo text-secondary borderless">
                                <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">Nombre</span>
                                    </div>
                                    <input type="text" class="form-control input" placeholder="Nombre oficial de la alianza" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td class="anchofijo text-secondary borderless">
                                <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">Tag</span>
                                    </div>
                                    <input type="text" class="form-control input" placeholder="Tag de la alianza" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="anchofijo text-secondary borderless">
                                <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">Estandarte (260x60px)</span>
                                    </div>
                                    <input type="text" class="form-control input" placeholder="Imagen de url" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </td>
                            <td class="anchofijo text-secondary borderless">
                                <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                    <div class="input-group-append">
                                        <span class="input-group-text bg-dark text-light">Logo (400x400px)</span>
                                    </div>
                                    <input type="text" class="form-control input" placeholder="Imagen de url " aria-label="Recipient's username" aria-describedby="basic-addon2">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="anchofijo text-success borderless">
                                Portada
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="anchofijo text-secondary ">
                                <textarea class="ckeditor" name="portada" id="portada"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th colspan="2" class="anchofijo text-success borderless">
                                Texto interno
                            </th>
                        </tr>
                        <tr>
                            <td colspan="2" class="anchofijo text-secondary ">
                                <textarea class="ckeditor" name="interno" id="interno"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" class="anchofijo text-success borderless">
                                <button type="button" class="btn btn-outline-success btn-block btn-sm " data-toggle="modal" data-target="#datosModal">
                                    <i class="fa fa-check-double"></i> Fundar alianza
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection