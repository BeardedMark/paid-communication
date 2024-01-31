<div class="color-contrast hover pos pos-col fib-p-8 fib-r-8 link">
    <div class="pos pos-row fib-gap-8 pos-x-end font-size-6">
        <span class="pos pos-w-max color-second ">{{ $message->getAutor() }}</span>
        <a class="pos pos-end link"
            href="{{ route('messages.show', ['message' => $message, 'chat' => $message->chat]) }}">{{ $message->getTime() }}</a>
    </div>

    <div class="pos pos-row fib-gap-8 pos-x-end">
        <span class="pos pos-w-max">{{ $message->content }}</span>
        
        <form class="font-size-6" action="{{ route('messages.destroy', ['message' => $message]) }}"
            method="POST">
            @csrf
            @method('DELETE')

            <button class="button" type="submit">Удалить</button>
        </form>
    </div>
</div>
