@extends('auth.dashboard')

@section('title', 'Установка пароля')

@section('form')
    <form method="POST" action="{{ route('password.request') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">

        <div>
            <label for="email">Электронная почта</label>
            <input id="email" type="text" name="email" value="{{ $request->email }}" required readonly>
        </div>

        <div>
            <label for="password">Будущий пароль</label>
            <input id="password" type="password" name="password" required>
        </div>

        <div>
            <label for="password_confirmation">Подтверждение пароля</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Сохранить</button>
    </form>
@endsection
