@extends('principal.layout')

@section('content')
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 400px;
            padding: 15px;
            margin: auto;
        }

        .form-error {
            width: 100%;
            max-width: 500px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="name"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin select {
            margin-bottom: -1px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

        .form-signin button[type="submit"] {
            margin-top: 5px;
            margin-bottom: 15px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>
    <hr class="featurette-divider">
    @if ($errors->any())
        <div class="alert alert-danger form-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <main class="form-signin">
        <form method="POST" action="{{ route('user-profile-information.update') }}">
            @csrf
            @method('PUT')
            <img class="mb-4" src="{{ asset('favicon.png') }}" alt="">

            <div class="form-floating text-dark">
                <input id="name" class="form-control" type="name" name="name" required value="{{ Auth::user()->name }}">
                <label for="name" value="{{ __('user.nombre') }}">{{ __('user.nombre') }}</label>
            </div>
            <div class="form-floating text-dark">
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required value="{{ Auth::user()->email }}">
                <label for="email" value="{{ __('user.email') }}">{{ __('user.email') }}</label>
            </div>
            <div class="form-floating text-dark">
                <select id="timezone" name="timezone" class="form-control form-select-lg">
                    @foreach (timezone_identifiers_list() as $timeZone)
                        <option value="{{ $timeZone }}" {{ Auth::user()->timezone == $timeZone ? 'selected' : "" }}> {{ $timeZone }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-floating text-dark">
                <select id="idioma" name="idioma" class="form-control form-select-lg">
                    <option value="none">Selecciona tu idioma</option>
                    <option value="es" {{ Auth::user()->idioma == "es" ? 'selected' : "" }}> Español </option>
                    <option value="en" {{ Auth::user()->idioma == "en" ? 'selected' : "" }}> Ingles </option>
                </select>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('actualizar usuario') }}</button>
        </form>

        <form method="POST" action="{{ route('user-password.update') }}">
            @csrf
            @method('PUT')
            <div class="form-floating text-dark">
                <input id="current_password" name="current_password" type="password" class="form-control" wire:model.defer="state.current_password" autocomplete="current-password">
                <label for="current_password" value="{{ __('user.contraseña actual') }}">{{ __('user.contraseña actual') }}</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password" name="password" type="password" class="form-control" wire:model.defer="state.password" autocomplete="new-password">
                <label for="password" value="{{ __('user.contraseña') }}">{{ __('user.contraseña') }}</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password">
                <label for="password_confirmation" value="{{ __('user.confirmar contraseña') }}">{{ __('user.confirmar contraseña') }}</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('user.cambiar contraseña') }}</button>
        </form>
    </main>
@endsection
