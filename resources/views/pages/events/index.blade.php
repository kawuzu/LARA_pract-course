@extends('layouts.app')

@section('title', 'Наши мероприятия')

@section('content')

    <section class="events-hero">
        <h1>наши мероприятия</h1>
        <p>Станьте частью команды — участвуйте в наших акциях!</p>
    </section>

    <section class="events-calendar">
        {{-- календарь (пока статичный) --}}
    </section>

    <section class="events-list">
        @foreach($events as $event)
            <div class="event-card">
                <h3>{{ $event->title }}</h3>
                <p>{{ $event->description }}</p>
            </div>
        @endforeach
    </section>

@endsection
