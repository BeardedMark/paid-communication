@extends('chats.index')

@section('h1',  "Редактирование сообщения № $message->id")

@section('chat-content')
    <form action="{{ route('messages.update', compact('message')) }}" method="post">
        @csrf
        @method('PUT')
        <label for="content">Содержание:</label>
        <textarea name="content" id="content">{{ $message->content }}</textarea>
        <br>
        <button type="submit">Сохранить</button>
    </form>
    <br>
    <a href="{{ route('messages.show', ['message' => $message, 'chat' => $message->chat]) }}">Просмотр сообщения</a>
    {{-- <br> --}}
    {{-- <a href="{{ route('chats.messages.index', ['chat' => $message->chat]) }}">К списку сообщений</a> --}}
@endsection
