@extends('auth.dashboard')

@section('title', 'Восстановление пароля')

@section('form')
    <form method="POST" action="{{ route('password.email') }}" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Электронная почта или логин</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Восстановить пароль</button>
    </form>
@endsection
