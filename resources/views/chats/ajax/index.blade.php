<ul>
    @if (count($outgoing) > 0)
        <strong>Исходящие</strong>
        @foreach ($outgoing as $chat)
            @component('chats.components.chat', compact('chat'))
            @endcomponent
        @endforeach
    @endif

    @if (count($incoming) > 0)
        <strong>Входящие</strong>
        @foreach ($incoming as $chat)
            @component('chats.components.chat', compact('chat'))
            @endcomponent
        @endforeach
    @endif
</ul>
