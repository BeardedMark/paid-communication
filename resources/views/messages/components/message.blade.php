<div class="hover fib-p-8 fib-r-8">
    <div class="row">
        <div class="col">
            <a class="color-second font-size-6 link"
                href="{{ route('users.show', $message->user) }}">{{ $message->getAutor() }}</a>
            <span class="pos pos-w-max">{{ $message->content }}</span>
        </div>

        <div class="col col-auto font-size-6">
            <a class="color-second pos pos-end link"
                href="{{ route('messages.show', ['message' => $message, 'chat' => $message->chat]) }}">{{ $message->getTime() }}</a>
            <form class="font-size-6" action="{{ route('messages.destroy', ['message' => $message]) }}" method="POST">
                @csrf
                @method('DELETE')

                <button class="button" type="submit">Удалить</button>
            </form>
        </div>
    </div>
</div>
