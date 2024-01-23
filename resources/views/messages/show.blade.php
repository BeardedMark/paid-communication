@extends('chats.index')

@section('h1', "Сообщение № $message->id")
@section('chat-content')
    <p><strong>Содержание:</strong> {{ $message->content }}</p>
    <p><strong>Автор:</strong> {{ $message->user->name }}</p>
    <p><strong>Чат:</strong> {{ $message->chat->getTitle() }}</p>
    <p><strong>Дата написания:</strong> {{ $message->created_at }}</p>
    <p><strong>Дата изменения:</strong> {{ $message->updated_at }}</p>
    <a href="{{ route('chats.messages.edit', ['message' => $message, 'chat' => $message->chat]) }}">Редактировать
        сообщение</a>
    <br>
    <a href="{{ route('chats.messages.index', ['chat' => $message->chat]) }}">К списку сообщений</a>
@endsection
