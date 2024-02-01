@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col col-4">
            <div class="pos pos-col fib-gap-13">
                @component('users.components.card', ['user' => Auth::user()])
                @endcomponent

                <div id="chatList" class="back-main frame bord-second pos fib-13 font-size-6">
                    {{-- Список чатов --}}
                </div>
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
