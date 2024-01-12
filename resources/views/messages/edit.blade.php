@extends('layouts.app')
@section('title', 'Главная страница')
@section('description', 'Основная посадочная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Главная страница</h1>
                <form action="{{ route('messages.update', $id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <label for="title">Заголовок:</label>
                    <input type="text" name="title" id="title" value="{{ $message['title'] }}">
                    <br>
                    <label for="content">Содержание:</label>
                    <textarea name="content" id="content">{{ $message['content'] }}</textarea>
                    <br>
                    <button type="submit">Обновить</button>
                </form>
                <br>
                <a href="{{ route('messages.show', $id) }}">Просмотр сообщения</a>
                <br>
                <a href="{{ route('messages.index') }}">К списку сообщений</a>
            </div>
        </div>
    </div>
@endsection