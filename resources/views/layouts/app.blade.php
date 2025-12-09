<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Simple Site')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* минимальные стили, если npm не собран */
        body{font-family:system-ui,Arial, sans-serif;margin:0;padding:0;color:#111}
        .container{max-width:980px;margin:20px auto;padding:0 16px}
        header{display:flex;justify-content:space-between;align-items:center;padding:12px 0}
        nav a{margin-right:12px;text-decoration:none;color:#333}
        .card{border:1px solid #e5e5e5;padding:12px;border-radius:8px;background:#fff}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px}
        ul{padding-left:20px}
    </style>
</head>
<body>
<div class="container">
    <header>
        <div><a href="{{ route('home') }}"><strong>SimpleSite</strong></a></div>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('page1') }}">Страница1</a>
            <a href="{{ route('page2') }}">Страница2</a>
            @auth
                <a href="{{ route('dashboard') }}">Панель</a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" style="background:none;border:0;cursor:pointer">Выйти</button>
                </form>
            @else
                <a href="{{ route('login') }}">Вход</a>
                <a href="{{ route('register') }}">Регистрация</a>
            @endauth
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer style="margin-top:40px;padding:10px 0;color:#666">© SimpleSite</footer>
</div>
</body>
</html>
