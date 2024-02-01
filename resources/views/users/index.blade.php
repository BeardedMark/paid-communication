@extends('chats.index')

@section('chat-content')
    <div class="row">
        <div class="col">
            <h1>Все пользователи</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @foreach ($users as $user)
                <p><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></p>
            @endforeach
        </div>
    </div>
@endsection
