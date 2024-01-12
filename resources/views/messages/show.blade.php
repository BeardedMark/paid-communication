@extends('layouts.app')
@section('title', 'Главная страница')
@section('description', 'Основная посадочная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Главная страница</h1>
                <p><strong>Заголовок:</strong> {{ $message['title'] }}</p>
                <p><strong>Содержание:</strong> {{ $message['content'] }}</p>
                <a href="{{ route('messages.edit', $id) }}">Редактировать сообщение</a>
                <br>
                <a href="{{ route('messages.index') }}">К списку сообщений</a>
            </div>
        </div>
    </div>
@endsection
