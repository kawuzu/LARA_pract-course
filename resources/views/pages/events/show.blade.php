@extends('layouts.app')

@section('title', $event->title)

@section('content')
    <h1>{{ $event->title }}</h1>

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if($event->photo)
        <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}" style="max-width:100%;margin-bottom:12px;border-radius:8px;">
    @endif

    <div class="card" style="margin-bottom:16px">
        <p>{{ $event->description }}</p>
        <p><strong>Дата начала:</strong> {{ $event->starts_at->format('d.m.Y H:i') }}</p>
        <p><strong>Дата окончания:</strong> {{ $event->ends_at ? $event->ends_at->format('d.m.Y H:i') : '-' }}</p>
        <p><strong>Место проведения:</strong> {{ $event->location }}</p>
        <p><strong>Вместимость:</strong> {{ $event->capacity }}</p>
        <p><strong>Занято мест:</strong> {{ $event->users()->count() }}</p>
    </div>

    @auth
        @if($event->users()->where('user_id', auth()->id())->exists())
            <div class="flash">Вы уже записаны на это мероприятие.</div>
        @else
            <form method="POST" action="{{ route('events.register', $event) }}">
                @csrf
                <button class="btn" type="submit">Записаться</button>
            </form>
        @endif
    @else
        <p><a href="{{ route('login') }}">Войдите</a>, чтобы записаться на мероприятие.</p>
    @endauth
@endsection
