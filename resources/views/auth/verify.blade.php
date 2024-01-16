@extends('auth.dashboard')

@section('title', 'Требуется верификация')

@section('form')
    <form method="GET" action="{{ route('verification.resend') }}">
        @csrf
        <label>Подтверждение выслано на почту</label>
        <button type="submit">Выслать подтверждение повторно</button>
    </form>
@endsection
