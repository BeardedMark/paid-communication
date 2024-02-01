<div class="back-main frame bord-second pos fib-r-13 fib-p-13 font-size-6">
    <div class="row">
        <div class="col col-auto">
            <a href="{{ route('users.show', $user) }}" class="font-size-1 link">👤</a>
        </div>
        
        <div class="col">
            <a href="{{ route('users.show', $user) }}" class="font-size-4 link">{{ $user->name }}</a>
            <div><span>{{ $user->created_at }}</span></div>
            <div><span>{{ $user->balance }} руб</span></div>
        </div>
    </div>
</div>