<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('description', 'pcrent.devirs.com')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    {{-- Метатеги --}}
    @component('layouts.resources.meta')
    @endcomponent

    {{-- Шрифты --}}
    @component('layouts.resources.fonts')
    @endcomponent

    {{-- Стили --}}
    @component('layouts.resources.styles')
    @endcomponent
</head>

<body class="body">
    {{-- Шапка сайта --}}
    <header>
        {{-- @component('partials.header')
        @endcomponent --}}
    </header>

    {{-- <Навигация сайта --}}

    {{-- Контент сайта --}}
    <main id="main" class="position-relative fib-py-21">
        <div class="container">
            <div class="row">
                <div class="col col-auto">
                    @component('partials.sidebar')
                    @endcomponent
                </div>
                
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </div>
    </main>

    {{-- Подвал сайта --}}
    {{-- <footer>
        @component('partials.footer')
        @endcomponent
    </footer> --}}

    {{-- Скрипты сайта --}}
    @component('layouts.resources.scripts')
    @endcomponent
</body>

</html>
