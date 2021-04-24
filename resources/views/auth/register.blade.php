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
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <img class="mb-4" src="{{ asset('favicon.png') }}" alt="">

            <div class="form-floating text-dark">
                <input id="name" class="form-control" type="name" name="name" required autocomplete="current-name">
                <label for="name" value="{{ __('Name') }}">Name</label>
            </div>
            <div class="form-floating text-dark">
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                <label for="email" value="{{ __('Email') }}">Email address</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
                <label for="password" value="{{ __('Password') }}">Password</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required
                    autocomplete="new-password">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirm Password</label>
            </div>
            <div class="form-floating text-dark">
                <select id="timezone" name="timezone" class="form-control form-select-lg">
                    <optgroup label="Propios">
                        @foreach (timezone_identifiers_list() as $timeZone)
                            <option value="{{ $timeZone }}"> {{ $timeZone }} </option>
                        @endforeach
                    </optgroup>
                </select>
            </div>
            <div class="form-floating text-dark">
                <select id="idioma" name="idioma" class="form-control form-select-lg">
                    <option value="Español"> Español </option>
                    <option value="Ingles"> Ingles </option>
                </select>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Registrar') }}</button>
        </form>
    </main>
@endsection
