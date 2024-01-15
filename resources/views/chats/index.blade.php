@extends('layouts.app')
@section('title', 'Список чатов')
@section('description', 'Далог')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-3">
                <h1>Список чатов</h1>
                <a href="{{ route('chats.create') }}">Новый чат</a>
            </div>
            
            <div class="col col-3">
                @yield('chat')
            </div>
        </div>
    </div>
@endsection