@if (isset($incoming) && count($incoming) > 0)
    <li>Входящие</li>

    <ul>
        @foreach ($incoming as $chat)
        <li>        
            <a href="{{ route('chats.messages.index', $chat) }}">{{ $chat->getTitle() }}</a>
            <ul>
                @foreach ($chat->getLastThreeMessages(1) as $message)
                    @component('messages.components.message', compact('message'))
                    @endcomponent
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
@endif
