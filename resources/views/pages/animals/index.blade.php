@extends('layouts.app')

@section('title','Животные')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/animals.css') }}">
@endpush

@section('content')
    <section class="animals-page">
        <div class="animals-header">
            <h1>Животные в приюте</h1>

            <div class="animals-filters">
                <span class="muted">фильтры</span>
                <button class="filters-btn" type="button">☰</button>
            </div>
        </div>

        <div class="animals-grid">
            @foreach($animals as $animal)
                <div class="animal-card">

                    <div class="animal-image">
                        @if($animal->photo_url)
                            <img src="{{ $animal->photo_url }}" alt="{{ $animal->name }}">
                        @else
                            <div class="animal-no-photo">Нет фото</div>
                        @endif
                    </div>

                    <div class="animal-body">
                        <h3>{{ $animal->name ?? 'Без имени' }}</h3>

                        <div class="animal-meta">
                            @if($animal->gender === 'male')
                                <span class="gender male">♂</span>
                            @elseif($animal->gender === 'female')
                                <span class="gender female">♀</span>
                            @endif
                            <span class="age">{{ $animal->age ?? 'возраст неизвестен' }}</span>
                        </div>

                        <div class="animal-tags">
                            @if($animal->species)
                                <span>{{ $animal->species }}</span>
                            @endif
                            @if($animal->breed)
                                <span>{{ $animal->breed }}</span>
                            @endif
                        </div>

                        <p class="animal-desc">
                            {{ \Illuminate\Support\Str::limit($animal->description, 120) }}
                        </p>

                        <a href="{{ route('animals.show', $animal) }}" class="details-btn">
                            Подробнее
                        </a>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="pagination">
            {{ $animals->links() }}
        </div>

        <section class="tips-banner">
            <div class="tips-image">
                <img src="{{ asset('images/first_meeting_example.jpg') }}" alt="Советы">
            </div>

            <div class="tips-content">
                <h2>впервые заводите питомца?</h2>
                <p>
                    У нас есть несколько советов, как найти общий язык
                    с вашим первым хвостатым другом
                </p>
                <a href="#" class="tips-btn">посмотреть</a>
            </div>
        </section>

    </section>
@endsection
