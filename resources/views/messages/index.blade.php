@extends('chats.index')

@section('h1', $chat->getTitle())

@section('chat-content')
    <ul id="messageList"></ul>

    <form id="messageForm">
        @csrf
        <textarea class="w-100" name="message" id="messageText"></textarea>
        <button type="submit">Отправить</button>
    </form>

    <script>
        $(document).ready(function () {
            // Функция для обновления сообщений через Ajax
            function loadMessages() {
                $.ajax({
                    url: "{{ route('chats.messages.ajax', compact('chat')) }}",
                    method: "GET",
                    success: function (data) {
                        $("#messageList").html(data.messagesHtml);
                    },
                    error: function () {
                        alert("Ошибка загрузки сообщений");
                    }
                });
            }

            // Функция для отправки нового сообщения через Ajax
            $("#messageForm").submit(function (e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('chats.messages.store', compact('chat')) }}",
                    method: "POST",
                    data: formData,
                    success: function () {
                        $("#messageText").val('');
                        loadMessages();
                    },
                    error: function () {
                        alert("Ошибка отправки сообщения");
                    }
                });
            });

            // Обновление сообщений
            loadMessages();
            setInterval(loadMessages, 1000);
        });
    </script>
@endsection
