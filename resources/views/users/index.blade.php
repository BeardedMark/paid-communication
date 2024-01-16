@extends('layouts.app')

@section('title', 'Пользователи')
@section('description', 'Список всех пользователей сайта')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">

                @foreach ($users as $user)
                    <p><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></p>
                @endforeach
            </div>
        </div>
    </div>
@endsection
