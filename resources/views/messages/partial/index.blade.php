@foreach ($messages as $index => $message)
    <li>
        <a href="#"><small>{{ $message->user_id }} : </small></a>
        <a href="{{ route('messages.show', $index) }}">{{ $message->content }}</a>
    </li>
@endforeach