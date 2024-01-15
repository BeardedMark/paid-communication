@extends('layouts.app')

@section('title', 'Аутентификация')
@section('description', 'Аутентификация')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @component('partials.alert')
                @endcomponent
            </div>
        </div>

        <div class="row">
            <div class="col-3">
                @if (Auth::user())
                    <p><strong>{{ Auth::user()->name }}</strong></p>
                    <form method="POST" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Выйти</button>
                    </form>
                @else
                    <p><a href="{{ route('auth.login') }}">Авторизация</a></p>
                    <p><a href="{{ route('auth.register') }}">Регистрация</a></p>
                    <p><a href="{{ route('password.request') }}">Восстановить пароль</a></p>
                @endif

            </div>

            <div class="col">
                @yield('form')
            </div>
        </div>
    </div>
@endsection
