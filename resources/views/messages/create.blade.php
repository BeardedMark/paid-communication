<form id="message" action="{{ route('messages.store') }}">
    @csrf
    <input name="message">
    <button type="submit">Отправить</button>
</form>
<a href="{{ route('messages.create') }}">Крупное сообщение</a>

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