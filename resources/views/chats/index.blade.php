@if (count($outgoing) > 0)
    <strong>⬆️ Исходящие</strong>

    <ul>
        @foreach ($outgoing as $chat)
            @component('chats.components.chat', compact('chat'))
            @endcomponent
        @endforeach
    </ul>
@endif

@if (count($incoming) > 0)
    <strong>⬇️ Входящие</strong>
    
    <ul>
        @foreach ($incoming as $chat)
            @component('chats.components.chat', compact('chat'))
            @endcomponent
        @endforeach
    </ul>
@endif
