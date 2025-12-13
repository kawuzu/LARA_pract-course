@extends('layouts.app')

@section('title','Мероприятия')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/events.css') }}">
@endpush

@section('content')
    <div class="events-header">
        <h1>наши мероприятия</h1>
        <p>Станьте частью команды — участвуйте в наших акциях и благотворительных событиях!</p>
    </div>

    <div class="events-info">
        <div class="event-card">
            <h2>Дни открытых дверей</h2>
            <p>В этот день наш приют будет открыт для всех желающих. Вы сможете встретиться с кошками, узнать их истории и познакомиться с волонтёрами, которые заботятся о питомцах даже стать одним из них.</p>
        </div>
        <div class="event-card">
            <h2>Кото-фото-сессия</h2>
            <p>Приглашаем вас сделать профессиональные фото с нашими подопечными. Вы сможете выбрать своего "модельного" питомца и сделать вместе с ним смешные и трогательные фотографии. Все сборы от мероприятия пойдут на нужды приюта.</p>
        </div>
        <div class="event-card">
            <h2>Кошачьи мастер-классы: Знатоки будущего для пушистых друзей</h2>
            <p>Серия мастер-классов, посвященных уходу за кошками, их воспитанию и психологии. Ведущими мероприятий станут ветеринары, кинологи и опытные владельцы кошек.</p>
        </div>
    </div>

    <div class="calendar-container">
        <div class="calendar-controls">
            <label for="month">Выберите месяц:</label>
            <input type="month" id="month" name="month" />
            <button id="showBtn">Показать</button>
        </div>
        <div id="calendar" class="calendar-grid"></div>
    </div>

    <div class="events-cards">
        @forelse($events as $event)
            <div class="event-card-item">
                <h3>{{ $event->title }}</h3>
                <p class="event-date">{{ $event->starts_at ? $event->starts_at->format('d.m.Y H:i') : '' }} — {{ $event->location }}</p>
                <p>{{ \Illuminate\Support\Str::limit($event->description, 160) }}</p>
                <a href="{{ route('events.show', $event) }}" class="btn-more">Подробнее</a>
            </div>
        @empty
            <div class="event-card-item empty">Нет мероприятий на выбранную дату.</div>
        @endforelse
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const monthInput = document.getElementById('month');
                const calendarEl = document.getElementById('calendar');
                const showBtn = document.getElementById('showBtn');

                function generateCalendar(year, month) {
                    calendarEl.innerHTML = '';
                    const firstDay = new Date(year, month, 1).getDay();
                    const lastDate = new Date(year, month + 1, 0).getDate();
                    let offset = firstDay === 0 ? 6 : firstDay - 1;

                    for (let i = 0; i < offset; i++) {
                        const empty = document.createElement('div');
                        empty.classList.add('calendar-day', 'empty');
                        calendarEl.appendChild(empty);
                    }

                    for (let d = 1; d <= lastDate; d++) {
                        const day = document.createElement('div');
                        day.textContent = d;
                        day.classList.add('calendar-day');
                        day.addEventListener('click', function() {
                            const selectedDate = new Date(year, month, d);
                            const y = selectedDate.getFullYear();
                            const m = String(selectedDate.getMonth()+1).padStart(2,'0');
                            const dayStr = String(selectedDate.getDate()).padStart(2,'0');
                            window.location.href = "{{ route('events.filter') }}?date=" + y + '-' + m + '-' + dayStr;
                        });
                        calendarEl.appendChild(day);
                    }
                }

                const now = new Date();
                monthInput.value = now.toISOString().substr(0,7);
                generateCalendar(now.getFullYear(), now.getMonth());

                showBtn.addEventListener('click', function() {
                    const [y,m] = monthInput.value.split('-');
                    generateCalendar(parseInt(y), parseInt(m)-1);
                });
            });
        </script>
    @endpush
@endsection
