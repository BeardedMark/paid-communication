@extends('auth.dashboard')

@section('title', 'Восстановление пароля')

@section('form')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="name">Электронная почта или логин</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <button type="submit">Восстановить пароль</button>
    </form>
@endsection
