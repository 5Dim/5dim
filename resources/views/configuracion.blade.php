@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (!empty($emailDup))
                    <div class="alert alert-danger" role="alert">
                        {{ $emailDup }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Cambia tus opciones</div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/update') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <span class="input-group-text col-3" id="basic-addon1">Nombre</span>
                                <input id="name" type="text" class="form-control" placeholder="Nombre" aria-label="Nombre"
                                    aria-describedby="basic-addon1">
                                <div id="basic-addon1" class="form-text">
                                    La contraseña debe contener al menos 8 caracteres.
                                </div>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-3" id="basic-addon1">Email</span>
                                <input type="text" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-3" id="basic-addon1">Contraseña</span>
                                <input id="password" type="password" class="form-control" placeholder="Contraseña" aria-label="Contraseña"
                                    aria-describedby="passwordHelpBlock">
                                <div id="passwordHelpBlock" class="form-text">
                                    La contraseña debe contener al menos 8 caracteres.
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text col-3" id="basic-addon1">Confirmar contraseña</span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar contraseña"
                                    aria-label="Confirmar contraseña" aria-describedby="passwordHelpBlock">
                            </div>

                            {{-- <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                        value="{{ old('name') }}" autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Contrasenia</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar contrasenia</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                </div>
                            </div> --}}

                            <button type="submit" class="btn btn-primary">
                                Guardar cambios
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
