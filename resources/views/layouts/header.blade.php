<header class="header">
    <div class="container header__inner">
        <div class="logo">
            <a href="{{ route('home') }}">шепи</a>
        </div>

        <nav class="nav">
            <a href="{{ route('home') }}">Главная</a>
            <a href="{{ route('animals.index') }}">Приютить</a>
            <a href="#">Потеряшки/Найдёныши</a>
        </nav>

        <div class="header__actions">
            <button class="btn btn--green">пожертвовать</button>

            @auth
                <a href="{{ route('profile.edit') }}" class="avatar">
                    <img src="{{ auth()->user()->avatar
                        ? asset('storage/'.auth()->user()->avatar)
                        : asset('images/avatar-placeholder.png') }}">
                </a>
            @else
                <a href="{{ route('login') }}">Вход</a>
            @endauth
        </div>
    </div>
</header>
