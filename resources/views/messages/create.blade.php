@extends('chats.index')

@section('h1',  "Редактирование сообщения № $message->id")

@section('chat-content')

<form id="message" action="{{ route('messages.store') }}">
    @csrf
    <input name="message">
    <button type="submit">Отправить</button>
</form>

<script>
    $(document).ready(function() {
        $('#message').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '{{ route('messages.store') }}',
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
@endsection