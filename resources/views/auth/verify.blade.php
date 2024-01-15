@extends('auth.dashboard')

@section('title', 'Требуется верификация')

@section('form')
    <form method="GET" action="{{ route('verification.resend') }}" class="mt-3">
        @csrf
        <label class="form-label">Подтверждение выслано на почту</label>
        <button type="submit" class="btn btn-primary">Выслать подтверждение повторно</button>
    </form>
@endsection
