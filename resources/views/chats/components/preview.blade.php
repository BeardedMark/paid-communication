@foreach ($chats as $chat)
    <a class="color-contrast hover pos pos-col fib-p-8 fib-r-8 link" href="{{ route('chats.show', $chat) }}">
        <div class="row">
            <div class="col">
                <span class="pos pos-w-max font-bold">{{ $chat->getTitle() }}</span>
            </div>

            <div class="col col-auto">
                <span class="pos pos-end color-second">{{ $chat->getLastMessageDateTime() }}</span>
            </div>
        </div>

        @if (count($chat->getLastMessages(1)) > 0)
            @foreach ($chat->getLastMessages(1) as $message)
                <div class="row">
                    <div class="col">
                        <span class="pos pos-w-max">{{ $message->getAutor() }}: {{ $message->content }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <span class="pos pos-w-max color-second">Нет сообщений</span>
        @endif
    </a>
@endforeach
