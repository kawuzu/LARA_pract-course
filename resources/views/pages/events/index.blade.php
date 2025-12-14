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
    <div class="calenimg">
        <div class="calenimg_img">
            <img src="{{ asset('images/cat1.jpg') }}" alt="Котик">
        </div>
        <div class="calendar-container">
            <div class="calendar-controls">
                <input type="month" id="month" name="month" />
                <div id="calendar" class="calendar-grid"></div>
                <button id="showBtn">Показать</button>
            </div>
        </div>
    </div>
    <div class="events-cards">
        @forelse($events as $event)
            <div class="event-card-item">
                <a href="{{ route('events.show', $event) }}" ><h3>{{ $event->title }}</h3></a>
                <p class="event-date">{{ $event->starts_at ? $event->starts_at->format('d.m.Y H:i') : '' }} — {{ $event->location }}</p>
                <p>{{ \Illuminate\Support\Str::limit($event->description, 160) }}</p>

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
