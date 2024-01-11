<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <title>@yield('title', 'PCRENT')</title>
    <meta name="description" content="@yield('description', 'pcrent.devirs.com')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        @component('partials.header')
        @endcomponent
    </header>

    {{-- <Навигация сайта --}}

    {{-- Контент сайта --}}
    <main id="main" class="position-relative">
        @yield('content')
    </main>

    {{-- Подвал сайта --}}
    <footer>
        @component('partials.footer')
        @endcomponent
    </footer>

    {{-- Скрипты сайта --}}
    @component('layouts.resources.scripts')
    @endcomponent
</body>

</html>
