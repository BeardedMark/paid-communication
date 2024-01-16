@extends('layouts.app')
@section('title', 'Список чатов')
@section('description', 'Далог')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-3">
                <h1>Список чатов</h1>

                <div id="outgoing">
                    <p>⏳ Загрузка чатов...</p>
                </div>
            
                {{-- <div id="incoming">
                    <p>⏳ Загрузка чатов...</p>
                </div> --}}
            </div>

            <div class="col">
                @yield('chat')
            </div>
        </div>
    </div>

    <script>
        function updateOutgoingList() {
            $.ajax({
                url: '{{ route('chats.index.ajax') }}',
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

        // function updateIncomingList() {
        //     $.ajax({
        //         url: '{{ route('chats.index.ajax') }}',
        //         type: 'GET',
        //         success: function(data) {
        //             $('#incoming').html(data);
        //         },
        //         error: function(error) {
        //             console.log(error);
        //             $('#incoming').html('❌ Ошибка загрузки');
        //         }
        //     });
        // }

        $(document).ready(function() {
            updateOutgoingList();
            // updateIncomingList();

            setInterval(updateOutgoingList, 3000);
            // setInterval(updateIncomingList, 1000);
        });
    </script>
@endsection
