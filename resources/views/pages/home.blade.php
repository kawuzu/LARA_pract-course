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

                <form action="{{ route('animals.search') }}" method="GET" class="search-form">
                    <input type="text" name="location" placeholder="Где вы находитесь?" value="{{ request('location') }}">
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
    @include('partials.banner', ['banner' => \App\Models\Banner::inRandomOrder()->first()])

    {{-- STORIES --}}
    <section class="stories-section">
        <h2>ваши истории</h2>
        <div class="stories-grid">
            @foreach(\App\Models\Story::with('user')->take(4)->get() as $story)
                <a href="{{ route('stories.show', $story) }}" class="story-card">
                    @if($story->photo)
                        <img src="{{ asset('storage/' . $story->photo) }}" alt="{{ $story->title }}">
                    @else
                        <div class="no-image">Нет изображения</div>
                    @endif
                    <div class="overlay">{{ $story->title }}</div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- MAP + NEWS --}}

@endsection
