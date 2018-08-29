@extends('juego.layouts.recursosFrame')

@section('content')
    <div class="container">
        {{ Auth::user()->jugadores[0]->alianzas_id }}
        <nav>
            <div class="nav nav-pills nav-justified" id="nav-tab" role="tablist" style="border: 0px; margin: 5px" align="center">
                <a class="nav-item nav-link active" id="buscar-tab" data-toggle="tab" href="#buscar" role="tab" aria-controls="buscar" aria-selected="true">
                    Buscar alianza
                </a>
                <a class="nav-item nav-link" id="crear-tab" data-toggle="tab" href="#crear" role="tab" aria-controls="crear" aria-selected="false">
                    Crear alianza
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="buscar" role="tabpanel" aria-labelledby="buscar-tab">
                <div class="col-12 rounded cajita">
                    <div id="cuadro1" class="table-responsive">
                        <form method="POST" action="{{ url('juego/solicitudAlianza') }}" style="margin: 10px;">
                            @csrf
                            <table class="table table-borderless table-sm text-center anchofijo" style="margin-top: 5px !important">
                                <tr>
                                    <th colspan="2" class="anchofijo text-success borderless">
                                        <big>
                                            Buscar alianza
                                        </big>
                                    </th>
                                </tr>
                                <tr>
                                    <td class="anchofijo text-secondary ">
                                        <select name="listaAlianzas" id="listaAlianzas" class="form-control">
                                            @foreach ($alianzas as $alianza)
                                                <option value="{{$alianza->id}}">[{{ $alianza->tag }}] {{ $alianza->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="anchofijo text-secondary ">
                                        <button type="submit" class="btn btn-outline-success btn-block">
                                            <i class="fa fa-check-double"></i> Enviar solicitud
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="anchofijo text-secondary ">
                                        <textarea class="ckeditor" name="solicitud" id="solicitud">Mensaje de solicitud</textarea>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="crear" role="tabpanel" aria-labelledby="crear-tab">
                <div class="col-12 rounded cajita">
                    <div id="cuadro1" class="table-responsive">
                        <form method="POST" action="{{ url('juego/generarAlianza') }}" style="margin: 10px;">
                            @csrf
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
                                            <input type="text" class="form-control input" name="nombre" id="nombre" placeholder="Nombre oficial de la alianza" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        </div>
                                    </td>
                                    <td class="anchofijo text-secondary borderless">
                                        <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-dark text-light">Tag</span>
                                            </div>
                                            <input type="text" class="form-control input" name="tag" id="tag" placeholder="Tag de la alianza" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="anchofijo text-secondary borderless">
                                        <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-dark text-light">Estandarte (60x60px)</span>
                                            </div>
                                            <input type="text" class="form-control input" name="estandarte" id="estandarte" placeholder="Imagen de url" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                        </div>
                                    </td>
                                    <td class="anchofijo text-secondary borderless">
                                        <div class="input-group mb-4 " style="padding-left: 5px !important; padding-right: 5px !important">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-dark text-light">Logo (400x400px)</span>
                                            </div>
                                            <input type="text" class="form-control input" name="logo" id="logo" placeholder="Imagen de url " aria-label="Recipient's username" aria-describedby="basic-addon2">
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
                                        <button type="submit" class="btn btn-outline-success btn-block btn-sm">
                                            <i class="fa fa-check-double"></i> Fundar alianza
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#listaAlianzas').select2({
                placeholder: "Nombre de la alianza",
                theme: "bootstrap",
                width: '100%',
                language: "es"
            });
        });
    </script>
@endsection