@extends('pages.messanger')

@section('title', 'chats.create')

@section('chat')
    <div class="row">
        <div class="col">
            <h1>Новый чат</h1>

            @foreach ($users as $user)
                <div class="alert alert-warning">
                    <p><span>⚠️</span>{{ $user->name }}</p>
                </div>
            @endforeach


            <form action="{{ route('chats.store') }}" method="post">
                @csrf
                <label for="owner">Owner ID:</label>
                <input type="text" name="owner" required>

                <button type="submit">Create Personal Dialog</button>
            </form>
            <a href="{{ route('messages.index') }}">К списку сообщений</a>
        </div>
    </div>
@endsection
