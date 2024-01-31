@extends('layouts.app')

@section('content')
    {{-- <div class="row">
        <div class="col">
            <h1>@yield('h1', 'Все чаты')</h1>
        </div>
    </div> --}}

    <div class="row">
        <div class="col col-4">
            <div id="chatList" class="pos pos-col fib-gap-13">
            </div>
        </div>

        <div class="col">
            @yield('chat-content')
        </div>
    </div>

    <script>
        $(document).ready(function() {
            // Функция для загрузки чатов через Ajax
            function loadChats() {
                $.ajax({
                    url: "{{ route('chats.ajax') }}",
                    method: "GET",
                    success: function(data) {
                        $("#chatList").empty();
                        $("#chatList").append(data.ChatsHtml);
                    },
                    error: function() {
                        alert("Ошибка загрузки чатов");
                    }
                });
            }

            loadChats();
            setInterval(loadChats, 5000);
        });
    </script>
@endsection
