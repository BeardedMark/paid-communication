@extends('chats.index')

@section('title', 'База данных')
@section('description', 'Далог')

@section('chat')
    <div class="row">
        <div class="col">
            <h1>Чат с <a href="{{ route('users.show', $chat->owner->id) }}">{{ $chat->owner->name }}</a></h1>

            <div id="messages">
                <p>⏳ Загрузка сообщений...</p>
            </div>

            <script>
                function updateMessageList() {
                    $.ajax({
                        url: '{{ route('messages.index.ajax') }}',
                        type: 'GET',
                        success: function(data) {
                            $('#messages').html(data);
                        },
                        error: function(error) {
                            $('#messages').html('❌ Ошибка загрузки');
                        }
                    });
                }
                $(document).ready(function() {
                    updateMessageList();

                    setInterval(updateMessageList, 2000);
                });
            </script>

            <form id="message">
                @csrf
                <input name="message">
                <button type="submit">Отправить</button>
            </form>

            <script>
                $(document).ready(function() {
                    $('#message').submit(function(e) {
                        e.preventDefault();

                        $.ajax({
                            type: 'POST',
                            url: '{{ route('messages.store', ['chat_id' => $chat->id]) }}',
                            data: $(this).serialize(),
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    });
                });
            </script>
        </div>
    </div>
@endsection
