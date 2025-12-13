<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Приют')</title>

    <!-- Подключаем CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
<div class="container">
    <header>
        <div><a href="{{ route('home') }}"><strong>Шепи</strong></a></div>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('animals.index') }}">Приютить</a>
            <a href="{{ route('events.index') }}">Наши мероприятия</a>
            <a href="{{ route('advices.index') }}">Советы</a>
            <a href="{{ route('stories.index') }}">Ваши истории</a>
            <a href="{{ route('lost_reports.index') }}">Потеряшки/Найдёныши</a>

            @auth
                <a href="{{ route('profile.edit') }}">Профиль</a>
                @if(method_exists(auth()->user(), 'hasRole') ? auth()->user()->hasRole('admin') : (auth()->user()->role ?? null) === 'admin')
                    <a href="{{ route('admin.dashboard') }}">Админ</a>
                @endif
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="btn" style="border:none;background:none;cursor:pointer">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </header>

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    <main>
        @yield('content')
    </main>

    <footer>
        <nav class="navf">
            <div class="map-box">
                <img src="{{ asset('images/map.jpg') }}">
            </div>
            <div class="navas">
                <div>
            <a href="{{ route('home') }}"><strong>Шепи</strong></a>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('animals.index') }}">Приютить</a>
            <a href="{{ route('events.index') }}">Наши мероприятия</a>
            <a href="{{ route('advices.index') }}">Советы</a>
            <a href="{{ route('stories.index') }}">Ваши истории</a>
            <a href="{{ route('lost_reports.index') }}">Потеряшки/Найдёныши</a></div>
                <div></div>
                <div class="news-box">
                    <h3>будьте в курсе наших новостей</h3>

                    <form>
                        <input type="email" placeholder="адрес вашей почты">
                        <button>отправить</button>
                    </form>
                </div>
            </div>
            </nav>
    </footer>
</div>

@stack('scripts')
</body>
</html>
