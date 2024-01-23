@extends('chats.index')

@section('h1', $chat->getTitle())

@section('chat-content')
    <div id="dialog" style="max-height: 50vh; overflow: hidden; overflow-y: auto;">
        <button id="loadMore">Предыдущие</button>
        <div id="messageList"></div>
    </div>

    <form id="messageForm">
        @csrf
        <textarea class="w-100" name="message" id="messageText"></textarea>
        <button type="submit">Отправить</button>
    </form>

    <script>
        $(document).ready(function() {
            // Функция для обновления сообщений через Ajax
            function loadMessages() {
                $.ajax({
                    url: "{{ route('chats.messages.ajax', compact('chat')) }}",
                    method: "GET",
                    success: function(data) {
                        var dialog = $("#dialog");

                        var isScrolledToBottom = Math.ceil(dialog[0].scrollHeight - dialog.scrollTop()) <=
                        Math.ceil(dialog.outerHeight());

                        $("#messageList").html(data.messagesHtml);

                        if (isScrolledToBottom) {
                            dialog.scrollTop(dialog[0].scrollHeight);
                        }
                        
                    },
                    error: function() {
                        alert("Ошибка загрузки сообщений");
                    }
                });

            }

            // Функция для отправки нового сообщения через Ajax
            $("#messageForm").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('chats.messages.store', compact('chat')) }}",
                    method: "POST",
                    data: formData,
                    success: function() {
                        $("#messageText").val('');
                        loadMessages();
                    },
                    error: function() {
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
