@if (isset($outgoing) && count($outgoing) > 0)
    <li>Исходящие</li>

    <ul>
        @foreach ($outgoing as $chat)
        <li class="chatItem" data-chat-id="{{ $chat->id }}">
        
            <a href="{{ route('chats.messages.index', $chat) }}">{{ $chat->getTitle() }}</a>
            <ul>
                @foreach ($chat->getLastMessages(1) as $message)
                    @component('messages.components.message', compact('message'))
                    @endcomponent
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
@endif
