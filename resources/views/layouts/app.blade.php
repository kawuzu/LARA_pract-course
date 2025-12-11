<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title','Приют')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <style>
        body{font-family:system-ui,Arial, sans-serif;margin:0;padding:0;color:#111;background:#f7f7f8}
        .container{max-width:1100px;margin:20px auto;padding:0 16px}
        header{display:flex;justify-content:space-between;align-items:center;padding:12px 0}
        nav a{margin-right:12px;text-decoration:none;color:#333}
        .card{border:1px solid #e5e5e5;padding:12px;border-radius:8px;background:#fff}
        .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px}
        footer{margin-top:40px;padding:10px 0;color:#666}
        .btn{display:inline-block;padding:8px 12px;border-radius:6px;text-decoration:none;border:1px solid #ddd;background:#fff}
        .muted{color:#777;font-size:0.9rem}
        .flash{padding:12px;background:#e6ffe6;border:1px solid #b6efb6;margin-bottom:12px;border-radius:6px}
    </style>
    @stack('styles')
</head>
<body>
<div class="container">
    <header>
        <div><a href="{{ route('home') }}"><strong>Приют</strong></a></div>
        <nav>
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('animals.index') }}">Приютить</a>
            <a href="{{ route('events.index') }}">Наши мероприятия</a>
            <a href="{{ route('advices.index') }}">Советы</a>
            <a href="{{ route('stories.index') }}">Ваши истории</a>
            <a href="{{ route('lost_reports.index') }}">Потеряшки/Найдёныши</a>

        @auth
                <a href="{{ route('dashboard') }}">Профиль</a>
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
        © {{ date('Y') }} Приют — все права защищены.
        <div class="muted">Страницы и функционал: список мероприятий, животных и т.д.</div>
    </footer>
</div>

@stack('scripts')
</body>
</html>
