@extends('layouts.app')
@section('title', $event->title)
@section('content')
    <div style="max-width: 1200px; margin: 0 auto; padding: 24px;">
        <h1 style="text-align: center; color: #333; font-size: 2em; margin-bottom: 24px;">{{ $event->title }}</h1>

        @if(session('success'))
            <div style="background: #dff0d8; color: #3c763d; padding: 12px; border-radius: 8px; margin-bottom: 16px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif

        @if($event->photo)
            <div style="text-align: center; margin-bottom: 24px;">
                <img src="{{ asset('storage/' . $event->photo) }}" alt="{{ $event->title }}" style="max-width: 100%; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
            </div>
        @endif

        <p style="font-size: 1.1em; line-height: 1.6; margin-bottom: 16px;">{{ $event->description }}</p>

        <div style="background: white; padding: 24px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); margin-bottom: 24px;">

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 16px;">
                <div>
                    <p><strong>Дата начала:</strong> {{ $event->starts_at->format('d.m.Y') }}</p>
                    <p><strong>Время:</strong> {{ $event->starts_at->format('H:i') }}</p>
                </div>
                <div>
                    <p><strong>Место проведения:</strong> {{ $event->location }}</p>
                    <p><a href="#" style="color: #2E8B57;">посмотреть на карте</a></p>
                </div>
            </div>
        </div>

        @auth
            @if($event->users()->where('user_id', auth()->id())->exists())
                <div style="background: #dff0d8; color: #3c763d; padding: 16px; border-radius: 8px; text-align: center; margin-bottom: 16px;">
                    Вы уже записаны на это мероприятие.
                </div>
            @else
                <form method="POST" action="{{ route('events.register', $event) }}" style="text-align: center;">
                    @csrf
                    <button type="submit" style="background: #C8E6C9; color: #2E7D32; border: none; padding: 12px 32px; border-radius: 24px; font-size: 1.1em; cursor: pointer; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">записаться</button>
                </form>
            @endif
        @else
            <div style="text-align: center; padding: 16px; background: #f5f5f5; border-radius: 8px; margin-bottom: 16px;">
                <p><a href="{{ route('login') }}" style="color: #2E8B57;">Войдите</a>, чтобы записаться на мероприятие.</p>
            </div>
        @endauth
    </div>

    <div style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center; display: flex; align-items: center; gap: 24px;">
        <div style="flex: 1;">
            <img src="{{ asset('images/lost_cat_example.jpg') }}" alt="Потерялся кот" style="width: 100%; border-radius: 12px;">
            <p style="margin-top: 8px; font-weight: bold;">Пропал кот!!!</p>
        </div>
        <div style="flex: 1;">
            <button style="background: #8BC34A; color: white; border: none; padding: 16px 32px; border-radius: 8px; font-size: 1.2em; cursor: pointer;">Да!</button>
        </div>
    </div>

    <div style="background: linear-gradient(135deg, #87CEEB 0%, #E0F7FA 100%); padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
        <div style="flex: 1;">
            <img src="{{ asset('images/map_example.png') }}" alt="Карта приютов" style="width: 100%; border-radius: 12px;">
        </div>
        <div style="flex: 1; padding: 16px; text-align: center;">
            <h3 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 16px;">будьте в курсе наших новостей</h3>
            <form style="display: flex; gap: 8px; flex-wrap: wrap; align-items: flex-end;">
                <div style="flex: 1; min-width: 200px;">
                    <input type="email" placeholder="адрес вашей почты" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
                <button type="submit" style="background: #8BC34A; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">отправить</button>
            </form>
        </div>
    </div>
@endsection
