@auth
    @if (!auth()->user()->events->contains($event->id))
        <form action="{{ route('events.join', $event) }}" method="POST">
            @csrf
            <button type="submit">Записаться</button>
        </form>
    @else
        <form action="{{ route('events.leave', $event) }}" method="POST">
            @csrf
            <button type="submit">Отменить запись</button>
        </form>
    @endif
@endauth
