@extends('chats.index')

@section('h1', $chat->getTitle())

@section('chat-content')
    <div class="frame bord-second pos fib-13">
        <div id="dialog" style="max-height: 60vh; overflow: hidden; overflow-y: auto;">
            <button class="color-contrast hover fib-p-8 fib-r-8 bord-second" id="loadMore">Предыдущие</button>
            <div id="messageList"></div>
        </div>

        <form class="pos fib-gap-8" id="messageForm">
            @csrf
            <textarea class="color-contrast pos fib-p-8 fib-r-8 bord-second" name="message" id="messageText"></textarea>
            <button class="color-contrast hover fib-p-8 fib-r-8 bord-second" type="submit"><span>Отправить</span></button>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            let startDateMessages;
            let endDateMessage;

            // Функция для обновления сообщений через Ajax
            function loadMessages() {
                $.ajax({
                    url: "{{ route('chats.messages.preview', compact('chat')) }}",
                    method: "GET",
                    data: {
                        date: startDateMessages,
                    },
                    success: function(data) {
                        $("#messageList").prepend(data.messagesHtml);
                        $("#messageList").prepend(`<hr>`);

                        startDateMessages = data.previousDate;
                        endDateMessage = data.lastDate;

                        if (!data.previousDate) {
                            $("#loadMore").remove();
                        }
                    },
                    error: function() {
                        // alert("Ошибка загрузки предыдущих сообщений");

                        $("#loadMore").remove();
                    }
                });
            }

            // Функция для обновления сообщений через Ajax
            function checkNew() {
                $.ajax({
                    url: "{{ route('chats.messages.new', compact('chat')) }}",
                    method: "GET",
                    data: {
                        date: endDateMessage,
                    },
                    success: function(data) {
                        let dialog = $("#dialog");

                        let isScrolledToBottom = Math.ceil(dialog[0].scrollHeight - dialog
                                .scrollTop()) <=
                            Math.ceil(dialog.outerHeight());

                        $("#messageList").append(data.messagesHtml);

                        endDateMessage = data.lastDate;

                        if (isScrolledToBottom) {

                            scrollEnd();
                        }
                    },
                    error: function() {
                        alert("Ошибка загрузки новых сообщений");
                    }
                });
            }

            function scrollEnd() {
                let dialog = $("#dialog");
                dialog.scrollTop(dialog[0].scrollHeight);
            }

            // Функция для отправки нового сообщения через Ajax
            $("#messageForm").submit(function(e) {
                e.preventDefault();
                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('messages.store', compact('chat')) }}",
                    method: "POST",
                    data: formData,
                    success: function() {
                        $("#messageText").val('');
                    },
                    error: function() {
                        alert("Ошибка отправки сообщения");
                    }
                });
            });

            // Обработка нажатия клавиши "Enter" в поле ввода сообщения
            $("#messageText").keydown(function(e) {
                if (e.keyCode === 13 && !e.shiftKey) {
                    e.preventDefault();
                    $("#messageForm").submit();
                }
            });

            $("#loadMore").on("click", function() {
                loadMessages();
            });

            // Обновление сообщений
            loadMessages();
            scrollEnd();
            setInterval(checkNew, 1000);
        });
    </script>
@endsection
