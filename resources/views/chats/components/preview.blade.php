@if (isset($chats) && count($chats) > 0)
    <div class="frame bord-second pos fib-13 font-size-6">
        @foreach ($chats as $chat)
            <a class="color-contrast hover pos pos-col fib-p-8 fib-r-8 link" href="{{ route('chats.show', $chat) }}">

                <div class="pos pos-row fib-gap-8 pos-x-end">
                    <span class="pos pos-w-max font-bold">{{ $chat->getTitle() }}</span>
                    <span class="pos pos-end">{{$chat->getLastMessageDateTime()}}</span>
                </div>
                @if (count($chat->getLastMessages(1)) > 0)
                    @foreach ($chat->getLastMessages(1) as $message)
                        <div class="pos pos-row fib-gap-8 pos-x-end">
                            <span class="pos pos-w-max">{{ $message->getAutor() }}: {{ $message->content }}</span>
                        </div>
                    @endforeach
                @else
                    <span class="pos pos-w-max">Нет сообщений</span>
                @endif
            </a>
        @endforeach
    </div>
@endif
