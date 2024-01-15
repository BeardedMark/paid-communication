@extends('layouts.app')

@section('title', $user->name)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $user->name }}</h1>
                <p>ID: {{ $user->id }}</p>
                <p>Email: {{ $user->email }}</p>
                <p>Регистрация: {{ $user->created_at }}</p>

                @if ($user->updated_at != $user->created_at)
                    <p>Обновлен: {{ $user->updated_at }}</p>
                @endif

                @if ($user->deleted_at)
                    <p>Удален: {{ $user->deleted_at }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
