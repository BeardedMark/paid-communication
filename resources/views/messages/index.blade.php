@extends('layouts.app')
@section('title', 'Список сообщений')
@section('description', 'Основная посадочная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Список сообщений</h1>

                <ul id="message-list">
                    <li>Загрузка сообщений...</li>
                </ul>

                <script>
                    function updateMessageList() {
                        $.ajax({
                            url: '{{ route('messages.index.ajax') }}',
                            type: 'GET',
                            success: function(data) {
                                $('#message-list').html(data);
                            }
                        });
                    }
                    $(document).ready(function() {
                        updateMessageList();

                        setInterval(updateMessageList, 1000); // 1 seconds
                    });
                </script>

                <form id="message" action="{{ route('messages.store') }}">
                    @csrf
                    <input name="message">
                    <button type="submit">Отправить</button>
                </form>
                <a href="{{ route('messages.create') }}">Крупное сообщение</a>

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#message').submit(function(e) {
                            e.preventDefault();

                            $.ajax({
                                type: 'POST',
                                url: '{{ route('messages.store') }}',
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
    </div>
@endsection
