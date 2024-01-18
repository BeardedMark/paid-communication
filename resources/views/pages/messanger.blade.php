@extends('layouts.app')
@section('title', 'chats.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-3">
                <h1>Мессенджер</h1>

                <div id="outgoing">
                    <p>⏳ Загрузка чатов...</p>
                </div>
                <script>
                    function updateOutgoingList() {
                        $.ajax({
                            url: '{{ route('chats.index') }}',
                            type: 'GET',
                            success: function(data) {
                                $('#outgoing').html(data);
                            },
                            error: function(error) {
                                console.log(error);
                                $('#outgoing').html('❌ Ошибка загрузки');
                            }
                        });
                    }

                    $(document).ready(function() {
                        updateOutgoingList();
                        setInterval(updateOutgoingList, 1000);
                    });
                </script>
            </div>

            <div class="col">
                @yield('chat')
            </div>
        </div>
    </div>
@endsection
