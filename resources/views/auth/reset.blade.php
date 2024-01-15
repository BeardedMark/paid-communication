@extends('auth.dashboard')

@section('title', 'Установка пароля')

@section('form')
    <form method="POST" action="{{ route('password.request') }}" class="mt-3">
        @csrf
        <input type="hidden" name="token" value="{{ $request->token }}">

        <div class="mb-3">
            <label for="email" class="form-label">Электронная почта</label>
            <input id="email" type="text" name="email" value="{{ $request->email }}" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Будущий пароль</label>
            <input id="password" type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
    </form>
@endsection
