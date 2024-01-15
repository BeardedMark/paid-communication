@if (session('success'))
    <div class="alert alert-success">
        <p><span>✅</span> {{ session('success') }}</p>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-info">
        <p><span>ℹ️</span> {{ session('warning') }}</p>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        <p><span>❌</span> {{ session('error') }}</p>
    </div>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-warning">
            <p><span>⚠️</span> {{ $error }}</p>
        </div>
    @endforeach
@endif
