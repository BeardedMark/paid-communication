<div class="container">
    <div class="row">
        <div class="col">
            <ul> 
                <li><a href="{{ route('pages.welcome') }}">Главная</a></li>
                <li><a href="{{ route('pages.about') }}">Описание</a></li>
                <li><a href="404">404</a></li>
            </ul>
        </div>

        <div class="col">
            <ul>
                <li><a href="{{ route('users.index') }}">Пользователи</a></li>
                {{-- <li><a href="{{ route('messages.index') }}">Сообщения</a></li> --}}
                <li><a href="{{ route('chats.index') }}">Чаты</a></li>
            </ul>
        </div>

        <div class="col">
            <ul>
                <li><a href="{{ route('auth.dashboard') }}">{{ Auth::user() ? Auth::user()->name : 'Аккаунт'}}</a></li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <hr>
        </div>
    </div>
</div>