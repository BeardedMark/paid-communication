@if (isset($incoming) && count($incoming) > 0)
    <li>Входящие</li>

    <ul>
        @foreach ($incoming as $chat)
        <li class="chatItem" data-chat-id="{{ $chat->id }}">        
            <a href="{{ route('chats.messages.index', $chat) }}">{{ $chat->getTitle() }}</a>
        </li>
        @endforeach
    </ul>
@endif
