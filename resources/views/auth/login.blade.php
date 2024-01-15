@extends('auth.dashboard')

@section('title', 'Авторизация')

@section('form')
    <form method="POST" action="{{ route('auth.login') }}" class="mt-3">
        @csrf
        <div class="mb-3">
            <label for="login" class="form-label">Ваш логин или Email</label>
            <input id="login" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Текущий пароль</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
@endsection
