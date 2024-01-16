@if (session('success'))
    <p><span>✅</span> {{ session('success') }}</p>
@endif

@if (session('warning'))
    <p><span>ℹ️</span> {{ session('warning') }}</p>
@endif

@if (session('error'))
    <p><span>❌</span> {{ session('error') }}</p>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p><span>⚠️</span> {{ $error }}</p>
    @endforeach
@endif
