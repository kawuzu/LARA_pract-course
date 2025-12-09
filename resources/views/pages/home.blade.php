@extends('layouts.app')

@section('title','Главная')

@section('content')
    <h1>Главная</h1>

    <section style="margin-top:12px">
        <h2>Ближайшие мероприятия</h2>
        <div class="grid" style="grid-template-columns:repeat(auto-fill,minmax(300px,1fr))">
            @forelse($events as $event)
                <div class="card">
                    <h3>{{ $event->title }}</h3>
                    <p class="muted">{{ $event->starts_at ? $event->starts_at->format('d.m.Y H:i') : '' }} — {{ $event->location }}</p>
                    <p>{{ \Illuminate\Support\Str::limit($event->description, 150) }}</p>
                </div>
            @empty
                <div class="card">Нет мероприятий.</div>
            @endforelse
        </div>
    </section>

    <section style="margin-top:24px">
        <h2>Некоторые животные</h2>
        <div class="grid" style="grid-template-columns:repeat(auto-fill,minmax(220px,1fr))">
            @foreach($animals as $animal)
                <div class="card">
                    <h3>{{ $animal->name ?? 'Без имени' }}</h3>
                    <p class="muted">{{ $animal->species }} — {{ $animal->breed }}</p>
                    <p>{{ \Illuminate\Support\Str::limit($animal->description, 120) }}</p>
                    <p><a class="btn" href="{{ route('animals.show', $animal) }}">Подробнее</a></p>
                </div>
            @endforeach
        </div>
    </section>
@endsection
