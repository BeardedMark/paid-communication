@extends('auth.dashboard')

@section('title', 'Регистрация')

@section('form')
    <form method="POST" action="{{ route('auth.register') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Уникальный логин</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input id="email" type="text" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Будущий пароль</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
@endsection
