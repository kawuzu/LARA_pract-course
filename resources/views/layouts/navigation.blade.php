<nav style="padding: 20px; background: #f2f2f2;">
    <a href="/">Home</a> |
    <a href="/animals">Animals</a> |
    <a href="/events">Events</a> |
    <a href="/advices">Advices</a> |
    <a href="/stories">Stories</a> |
    <a href="/admin">Admin</a>|
@auth
        <a href="{{ route('dashboard') }}">Личный кабинет</a>
        <form method="POST" action="{{ route('logout') }}" style="display:inline">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    @else
        <a href="{{ route('login') }}">Вход</a>
        <a href="{{ route('register') }}">Регистрация</a>
    @endauth
</nav>
