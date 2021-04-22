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
    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
    @endif

    <main class="form-signin">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <img class="mb-4" src="{{ asset('favicon.png') }}" alt="">

            <div class="form-floating text-dark">
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus>
                <label for="email" value="{{ __('Email') }}">Email address</label>
            </div>
            <div class="form-floating text-dark">
                <input id="password" class="form-control" type="password" name="password" required
                    autocomplete="current-password">
                <label for="password" value="{{ __('Password') }}">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            @if (Route::has('password.request'))
                <div class="checkbox mb-3">
                    <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                </div>
            @endif
            <button class="w-100 btn btn-lg btn-primary" type="submit">{{ __('Login') }}</button>
        </form>
    </main>
    {{-- <div>
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
            autofocus />
    </div>

    <div class="mt-4">
        <x-jet-label for="password" value="{{ __('Password') }}" />
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
            autocomplete="current-password" />
    </div>

    <div class="block mt-4">
        <label for="remember_me" class="flex items-center">
            <x-jet-checkbox id="remember_me" name="remember" />
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>

    <div class="flex items-center justify-end mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ route('password.request') }}">aaaaaaaaaaaaaaaaaaaa
                {{ __('Forgot your password?') }}
            </a>
        @endif

        <x-jet-button class="ml-4">
            {{ __('Login') }}
        </x-jet-button>
    </div>
    </form> --}}
@endsection
