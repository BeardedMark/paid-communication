@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>@yield('h1', 'Все чаты')</h1>
            </div>
        </div>

        <div class="row">
            <div class="col col-4">
                <ul id="chatList">
                    <!-- Здесь будут динамически добавляться чаты -->
                </ul>
            </div>

            <div class="col">
                @yield('chat-content')
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Функция для загрузки чатов через Ajax
            function loadChats() {
                $.ajax({
                    url: "{{ route('chats.ajax') }}",
                    method: "GET",
                    success: function (data) {
                        // Очищаем текущий список чатов
                        $("#chatList").empty();

                        // Вставляем новые данные в список
                        $("#chatList").append(data.outgoingChatsHtml);
                        $("#chatList").append(data.incomingChatsHtml);
                    },
                    error: function () {
                        alert("Ошибка загрузки чатов");
                    }
                });
            }

            // Загружаем чаты при загрузке страницы и обновляем каждые 5 секунд
            loadChats();
            setInterval(loadChats, 5000);
        });
    </script>
@endsection
