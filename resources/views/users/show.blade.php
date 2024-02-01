@extends('chats.index')

@section('chat-content')
    <div class="row">
        <div class="col">
            <h1>{{ $user->name }}</h1>
            <p>ID: {{ $user->id }}</p>
            <p>Email: {{ $user->email }}</p>
            <p>Регистрация: {{ $user->created_at }}</p>

            @if ($user->email_verified_at)
                <p>Подтверждение: {{ $user->email_verified_at }}</p>
            @endif

            @if ($user->updated_at != $user->created_at)
                <p>Обновление: {{ $user->updated_at }}</p>
            @endif

            @if ($user->deleted_at)
                <p>Удаление: {{ $user->deleted_at }}</p>
            @endif

            <form action="{{ route('chats.store') }}" method="post">
                @csrf
                <input type="text" name="owner_id" value="{{ $user->id }}" required hidden>
                <input type="text" name="initiator_id" value="{{ Auth::user()->id }}" required hidden>

                <button type="submit">Создать чат</button>
            </form>
        </div>
    </div>
@endsection
