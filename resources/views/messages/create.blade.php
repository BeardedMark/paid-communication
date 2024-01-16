@extends('layouts.app')
@section('title', 'Главная страница')
@section('description', 'Основная посадочная страница')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Главная страница</h1>
                
                <form action="{{ route('messages.store') }}" method="post">
                    @csrf
                    <input name="message">
                    <button type="submit">Отправить</button>
                </form>

                <a href="{{ route('messages.index') }}">К списку сообщений</a>
            </div>
        </div>
    </div>
@endsection