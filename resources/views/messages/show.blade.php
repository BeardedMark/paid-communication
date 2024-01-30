@extends('chats.index')

@section('h1', "Сообщение № $message->id")
@section('chat-content')
    <ul>
        <li>Подробности</li>
        <ul>
            <li><strong>Текст:</strong> {{ $message->content }}</li>
            <li><strong>Автор:</strong> {{ $message->user->name }}</li>
            <li><strong>Чат:</strong> {{ $message->chat->getTitle() }}</li>
            <li><strong>Дата написания:</strong> {{ $message->created_at }}</li>
            <li><strong>Дата изменения:</strong> {{ $message->updated_at }}</li>
        </ul>
    </ul>

    <ul>
        <li>Действия</li>
        <ul>
            <li><a href="{{ route('messages.edit', compact('message')) }}">Редактировать
                    сообщение</a></li>
            <li>
                <form action="{{ route('messages.destroy', ['message' => $message]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit">Удалить</button>
                </form>
            </li>
        </ul>
    </ul>
@endsection
