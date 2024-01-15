@extends('chats.index')

@section('title', 'База данных')
@section('description', 'Далог')

@section('chat')
<div class="row">
    <div class="col col-3">
        <h1>{{ $title }}</h1>
        <p>{{ $description }}</p>
    </div>
</div>
@endsection