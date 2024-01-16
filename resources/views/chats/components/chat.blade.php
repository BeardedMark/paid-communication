<li>
    <a href="{{ route('chats.show', $chat) }}">
        {{ $chat->initiator->name }} > {{ $chat->owner->name }}
    </a>
</li>