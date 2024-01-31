@if (isset($incoming) && count($incoming) > 0)
    <li>Входящие</li>

    <ul class="bord-second pos fib-13 font-size-6">
        @foreach ($incoming as $chat)
            <a class="hover-second pos pos-col fib-8 link" href="{{ route('chats.show', $chat) }}">
                @foreach ($chat->getLastMessages(1) as $message)
                    <div class="pos pos-row">
                        <span class="pos pos-w-max font-bold">{{ $chat->getTitle() }}</span>
                        <span>{{ $message->getTime() }}</span>
                    </div>
                       
                    <span>{{ $message->getAutor() }}: {{ $message->content }}</span>
                @endforeach
            </a>
        @endforeach
    </ul>
@endif
