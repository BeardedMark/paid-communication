@extends('auth.dashboard')

@section('title', 'Авторизация')

@section('form')
    <form method="POST" action="{{ route('auth.login') }}">
        @csrf
        <div>
            <label for="login" >Ваш логин или Email</label>
            <input id="login" type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="password">Текущий пароль</label>
            <input id="password" type="password" name="password" required>
        </div>

        <button type="submit">Войти</button>
    </form>
@endsection
