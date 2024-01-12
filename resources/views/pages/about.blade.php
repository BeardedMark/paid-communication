@extends('layouts.app')
@section('title', $title)
@section('description', $description)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $title }}</h1>
                <p>{{ $description }}</p>
            </div>
        </div>
    </div>
@endsection