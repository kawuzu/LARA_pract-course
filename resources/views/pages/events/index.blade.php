@extends('layouts.app')

@section('title','Мероприятия')

@section('content')
    <h1>Наши мероприятия</h1>

    <!-- Форма фильтра по дате -->
    <form method="GET" action="{{ route('events.filter') }}" style="margin-bottom:20px; display:flex; align-items:center; gap:8px;">
        <label for="date">Выберите дату:</label>
        <input type="date" name="date" id="date" value="{{ $date ?? '' }}" style="padding:6px;"/>
        <button type="submit" class="btn">Показать</button>
        <a href="{{ route('events.index') }}" class="btn">Сбросить</a>
    </form>

    <!-- Сетка календаря -->
    <div id="calendar" style="display:grid; grid-template-columns:repeat(7,1fr); gap:4px; margin-bottom:16px;">
        @php
            $today = \Carbon\Carbon::now();
            $firstDay = $today->copy()->startOfMonth();
            $lastDay = $today->copy()->endOfMonth();
            $dayOfWeek = $firstDay->dayOfWeek; // 0=Sun ... 6=Sat
        @endphp

        @for($i=0; $i<$dayOfWeek; $i++)
            <div></div>
        @endfor

        @for($day = 1; $day <= $lastDay->day; $day++)
            @php $dayDate = $today->copy()->day($day)->format('Y-m-d'); @endphp
            <div>
                <label style="display:block; padding:6px; border:1px solid #ddd; border-radius:4px; text-align:center; cursor:pointer;">
                    <input type="radio" name="date" value="{{ $dayDate }}" style="display:none;" @if(isset($date) && $date == $dayDate) checked @endif>
                    {{ $day }}
                </label>
            </div>
        @endfor
    </div>

    <!-- Карточки мероприятий -->
    <div class="grid" style="grid-template-columns:repeat(auto-fill,minmax(300px,1fr))">
        @forelse($events as $event)
            <div class="card">
                <h3>{{ $event->title }}</h3>
                <p class="muted">{{ $event->starts_at ? $event->starts_at->format('d.m.Y H:i') : '' }} — {{ $event->location }}</p>
                <p>{{ \Illuminate\Support\Str::limit($event->description, 160) }}</p>
            </div>
        @empty
            <div class="card">Нет мероприятий на выбранную дату.</div>
        @endforelse
    </div>
@endsection
