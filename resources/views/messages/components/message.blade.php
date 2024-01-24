<li>
    <div>
        <small>
            <a href="{{ route('users.show', $message->user->id) }}">{{ $message->getAutor() }}</a>
            <span>:</span>
            <a
                href="{{ route('chats.messages.show', ['message' => $message, 'chat' => $message->chat]) }}">{{ $message->getTime() }}</a>
        </small>
    </div>
    <div>{{ $message->content }}</div>
</li>
