@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">

    {{-- HERO --}}
    <section class="home-hero">
        <h1>Любовь спасает жизни!</h1>
        <p>
            Мы помогаем бездомным животным находить <b>заботливые</b> дома.
            Присоединяйтесь к нашей миссии — создадим лучшее будущее <b>вместе!</b>
        </p>
    </section>

    {{-- HERO CARD --}}
    <section class="home-hero-card">
        <div class="hero-card">
            <img src="{{ asset('images/cat.jpg') }}" alt="Котик">

            <div class="hero-card-text">
                <h2>Ваша история начинается здесь!</h2>
                <p>
                    Откройте дверь своему новому четвероногому другу уже сегодня!
                </p>

                <form action="{{ route('animals.index') }}" method="GET">
                    <input type="text" name="location" placeholder="где вы находитесь?">
                    <button type="submit">вперёд!</button>
                </form>
            </div>
        </div>
    </section>

    {{-- HELP --}}
    <section class="home-help">
        <h2>как ещё можно помочь?</h2>

        <div class="help-grid">
            <div class="help-item">
                <img src="{{ asset('images/help-donate.svg') }}">
                <h3>пожертвовать</h3>
                <p>
                    Финансовая поддержка поможет приюту обеспечить корм и лечение
                    бездомным кошкам.
                </p>
            </div>

            <div class="help-divider">или</div>

            <div class="help-item">
                <img src="{{ asset('images/help-volunteer.svg') }}">
                <h3>стать волонтёром</h3>
                <p>
                    Помогите в уходе за животными и участвуйте в новых проектах приюта!
                </p>
            </div>
        </div>
    </section>

    {{-- LOST --}}
    <section class="home-lost">
        <h2>Потеряли питомца?</h2>
        <a href="{{ route('animals.index') }}" class="lost-btn">да!</a>
    </section>

    {{-- STORIES --}}
    <section class="home-stories">
        <h2>ваши истории</h2>

        <div class="stories-grid">
            @foreach($stories ?? [] as $story)
                <img src="{{ asset('storage/'.$story->image) }}">
            @endforeach
        </div>
    </section>

    {{-- MAP + NEWS --}}
    <section class="home-map">
        <div class="map-box">
            <img src="{{ asset('images/map.jpg') }}">
        </div>

        <div class="news-box">
            <h3>будьте в курсе наших новостей</h3>

            <form>
                <input type="email" placeholder="адрес вашей почты">
                <button>отправить</button>
            </form>
        </div>
    </section>
@endsection
