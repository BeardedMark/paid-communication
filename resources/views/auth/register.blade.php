@extends('auth.dashboard')

@section('title', 'Регистрация')

@section('form')
    <form method="POST" action="{{ route('auth.register') }}">
        @csrf

        <div>
            <label for="name">Уникальный логин</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label for="email">Электронная почта</label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" required>
        </div>

        <div>
            <label for="password">Будущий пароль</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Подтверждение пароля</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Зарегистрироваться</button>
    </form>
@endsection
