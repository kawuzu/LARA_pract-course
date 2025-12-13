@extends('layouts.app')
@section('title','Мероприятия')
@section('content')
    <div style="background: white; padding: 24px; text-align: center;">
        <h1 style="color: #2E8B57; font-size: 2em; margin-bottom: 16px;">наши мероприятия</himag>
            <p style="font-size: 1.1em; margin-bottom: 24px;">Станьте частью команды — участвуйте в наших акциях и благотворительных событиях!</p>
    </div>

    <div style="background: linear-gradient(135deg, #E8F5E9 0%, #C8E6C9 100%); padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; display: flex; align-items: center; gap: 24px;">
        <div style="flex: 1;">
            <img src="{{ asset('images/event_cat_example.jpg') }}" alt="Кошка на мероприятии" style="width: 100%; border-radius: 12px;">
        </div>
        <div style="flex: 1; padding: 16px; background: #81D4FA; border-radius: 12px; position: relative;">
            <div style="background: #A5D6A7; padding: 8px; border-radius: 8px; margin-bottom: 16px; font-weight: bold;">
                февраль
            </div>
            <div style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; margin-bottom: 16px;">
                <div style="padding: 8px; text-align: center; font-weight: bold;">1</div>
                <div style="padding: 8px; text-align: center; background: #BBDEFB; font-weight: bold;">2</div>
                <div style="padding: 8px; text-align: center;">3</div>
                <div style="padding: 8px; text-align: center;">4</div>
                <div style="padding: 8px; text-align: center;">5</div>
                <div style="padding: 8px; text-align: center;">6</div>
                <div style="padding: 8px; text-align: center;">7</div>
                <div style="padding: 8px; text-align: center;">8</div>
                <div style="padding: 8px; text-align: center;">9</div>
                <div style="padding: 8px; text-align: center;">10</div>
                <div style="padding: 8px; text-align: center;">11</div>
                <div style="padding: 8px; text-align: center;">12</div>
                <div style="padding: 8px; text-align: center;">13</div>
                <div style="padding: 8px; text-align: center;">14</div>
                <div style="padding: 8px; text-align: center;">15</div>
                <div style="padding: 8px; text-align: center;">16</div>
                <div style="padding: 8px; text-align: center;">17</div>
                <div style="padding: 8px; text-align: center;">18</div>
                <div style="padding: 8px; text-align: center;">19</div>
                <div style="padding: 8px; text-align: center;">20</div>
                <div style="padding: 8px; text-align: center;">21</div>
                <div style="padding: 8px; text-align: center;">22</div>
                <div style="padding: 8px; text-align: center;">23</div>
                <div style="padding: 8px; text-align: center;">24</div>
                <div style="padding: 8px; text-align: center;">25</div>
                <div style="padding: 8px; text-align: center;">26</div>
                <div style="padding: 8px; text-align: center;">27</div>
                <div style="padding: 8px; text-align: center;">28</div>
            </div>
            <button style="background: #CDDC39; color: #333; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer; position: absolute; bottom: 16px; left: 50%; transform: translateX(-50%);">
                показать
            </button>
        </div>
    </div>

    <div style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 24px;">
            <div style="background: #E8F5E9; padding: 16px; border-radius: 12px; margin-bottom: 16px;">
                <h2 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 8px;">Дни открытых дверей</h2>
                <p>В этот день наш приют будет открыт для всех желающих. Вы сможете встретиться с кошками, узнать их истории и познакомиться с волонтерами, которые заботятся о питомцах даже стать одним из них.</p>
            </div>
            <div style="background: #E8F5E9; padding: 16px; border-radius: 12px; margin-bottom: 16px;">
                <h2 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 8px;">Кото-фото-сессия</h2>
                <p>Приглашаем вас сделать профессиональные фото с нашими подопечными. Вы сможете выбрать своего "модельного" питомца и сделать вместе с ним смешные и трогательные фотографии. Все сборы от мероприятия пойдут на нужды приюта.</p>
            </div>
            <div style="background: #E8F5E9; padding: 16px; border-radius: 12px;">
                <h2 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 8px;">Кошачьи мастер-классы: Знатоки будущего для пушистых друзей</h2>
                <p>Серия мастер-классов, посвященных уходу за кошками, их воспитанию и психологии. Ведущими мероприятий станут ветеринары, кинологи и опытные владельцы кошек.</p>
            </div>
        </div>
    </div>

    <div style="background: white; padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 24px;">
        <div style="flex: 1;">
            <img src="{{ asset('images/lost_cat_example.jpg') }}" alt="Потерялся кот" style="width: 100%; border-radius: 12px;">
            <p style="margin-top: 8px; font-weight: bold;">Пропал кот!!!</p>
        </div>
        <div style="flex: 1; text-align: center;">
            <button style="background: #8BC34A; color: white; border: none; padding: 24px 48px; border-radius: 12px; font-size: 1.4em; cursor: pointer;">
                Да!
            </button>
        </div>
    </div>

    <!-- Календарь -->
    <div style="margin: 24px auto; max-width: 1200px;">
        <div style="margin-bottom: 20px; display: flex; gap: 8px; align-items: center;">
            <label for="month" style="font-weight: bold;">Выберите месяц:</label>
            <input type="month" id="month" name="month" style="padding: 8px; border: 1px solid #ccc; border-radius: 8px;" />
            <button id="showBtn" style="background: #4CAF50; color: white; border: none; padding: 8px 16px; border-radius: 8px; cursor: pointer;">Показать</button>
        </div>
        <div id="calendar" style="display: grid; grid-template-columns: repeat(7, 1fr); gap: 4px; margin-bottom: 20px;"></div>
    </div>

    <!-- Карточки мероприятий -->
    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 16px; margin: 24px auto; max-width: 1200px;">
        @forelse($events as $event)
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 16px;">
                <h3 style="color: #2E8B57; font-size: 1.2em; margin-bottom: 8px;">{{ $event->title }}</h3>
                <p style="color: #666; font-size: 0.9em; margin-bottom: 8px;">{{ $event->starts_at ? $event->starts_at->format('d.m.Y H:i') : '' }} — {{ $event->location }}</p>
                <p style="margin-bottom: 16px;">{{ \Illuminate\Support\Str::limit($event->description, 160) }}</p>
                <a href="{{ route('events.show', $event) }}" style="background: #4CAF50; color: white; text-decoration: none; padding: 8px 16px; border-radius: 8px; display: inline-block;">Подробнее</a>
            </div>
        @empty
            <div style="background: white; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 16px; text-align: center;">Нет мероприятий на выбранную дату.</div>
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
                        empty.style.padding = '8px';
                        calendarEl.appendChild(empty);
                    }

                    for (let d = 1; d <= lastDate; d++) {
                        const day = document.createElement('div');
                        day.textContent = d;
                        day.style.padding = '8px';
                        day.style.border = '1px solid #ccc';
                        day.style.textAlign = 'center';
                        day.style.cursor = 'pointer';
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
