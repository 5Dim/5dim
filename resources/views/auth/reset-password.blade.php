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
            max-width: 330px;
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
            margin-top: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }

    </style>

    <main class="form-signin">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <img class="mb-4" src="{{ asset('favicon.png') }}" alt="">
            <div class="form-floating text-dark">
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus>
                <label for="email" value="{{ __('user.email') }}">{{ __('user.email') }}</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
                <label for="password" value="{{ __('user.contraseña') }}">{{ __('user.contraseña') }}</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <label for="password_confirmation" value="{{ __('user.confirmar contraseña') }}">{{ __('user.confirmar contraseña') }}</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('cambiar contraseña') }}</button>
        </form>
    </main>

@endsection
