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

        .form-signin input[type="password"] {
            margin-bottom: 10px;
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
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img class="mb-4" src="{{ asset('favicon.png') }}" alt="">

            <div class="form-floating text-dark">
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus>
                <label for="email" value="{{ __('user.email') }}">{{ __('user.email') }}</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
                <label for="password" value="{{ __('user.contraseña') }}">{{ __('user.contraseña') }}</label>
            </div>
            @if (Route::has('password.request'))
                <div class="checkbox mb-3">
                    <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('olvidaste contraseña') }}
                    </a>
                </div>
            @endif
            <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
        </form>
    </main>
@endsection
