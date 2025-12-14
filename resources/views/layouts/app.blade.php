<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Приют')</title>
    <script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A053bd947d462cc1a45aeba4070defff75501905071c0eaf68436ac9976ec698c&amp;id=mymap&amp;lang=ru_RU&amp;apikey=<API-ключ>"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @stack('styles')
</head>
<body>
<div class="container">
    <header>
        <div class="logo">
            <a href="{{ route('home') }}"><img src="{{ asset('images/Group 10.png') }}" alt="logo"></a>
        </div>
        <nav>
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
                <div id="mymap" style="width: 300px; height: 300px"></div>
            </div>
            <div class="navas">
                <div class="news-box">
                    <h3>будьте в курсе наших новостей</h3>
                    <form>
                        <input type="email" placeholder="адрес вашей почты">
                        <button>отправить</button>
                    </form>
                </div>
                <div class="nb">
                    <div class="logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('images/Group 10.png') }}" alt="logo"></a>
                    </div>
            <a href="{{ route('animals.index') }}">Приютить</a>
            <a href="{{ route('events.index') }}">Наши мероприятия</a>
            <a href="{{ route('advices.index') }}">Советы</a>
            <a href="{{ route('stories.index') }}">Ваши истории</a>
            <a href="{{ route('lost_reports.index') }}">Потеряшки/Найдёныши</a></div>
                </div>
            </nav>
    </footer>
</div>

@stack('scripts')
</body>
</html>
