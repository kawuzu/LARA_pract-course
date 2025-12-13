@extends('layouts.app')
@section('title', 'Профиль')
@section('content')
    <div style="max-width: 800px; margin: 0 auto; padding: 24px; font-family: Arial, sans-serif;">

        <!-- Аватар и имя -->
        <div style="display: flex; align-items: center; gap: 16px; margin-bottom: 24px;">
            <div style="width: 80px; height: 80px; border-radius: 50%; background: #ddd; overflow: hidden;">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}"
                     alt="Аватар"
                     style="width: 100%; height: 100%; object-fit: cover;">
            </div>
            <h1 style="font-size: 2em; margin: 0;">{{ $user->name }}</h1>
        </div>

        <!-- Мои мероприятия -->
        <div style="margin-bottom: 32px;">
            <h2 style="font-size: 1.4em; margin-bottom: 16px; color: #555;">Мои мероприятия</h2>
            @if($events->count() === 0)
                <p>Вы ещё не записаны ни на одно мероприятие.</p>
            @else
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    @foreach($events as $event)
                        <div style="background: #f0f9f0; padding: 16px; border-radius: 8px; display: flex; justify-content: space-between; align-items: center;">
                            <div>
                                <h3 style="margin: 0; font-size: 1.2em;">{{ $event->title }}</h3>
                            </div>
                            <div style="background: #87CEEB; color: white; padding: 4px 12px; border-radius: 12px; font-weight: bold;">
                                {{ \Carbon\Carbon::parse($event->date)->format('d.m.y') }} {{ \Carbon\Carbon::parse($event->date)->format('H:i') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <hr style="border: 1px solid #87CEEB; margin: 32px 0;">

        <!-- Настройки профиля -->
        <div>
            <h2 style="font-size: 1.4em; margin-bottom: 16px; color: #555;">Настройки профиля</h2>
            <form action="{{ route('profile.update') }}" method="POST" style="display: flex; flex-direction: column; gap: 16px;">
                @csrf
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label style="font-weight: bold;">Логин</label>
                    <div style="color: #888;">{{ $user->name }}</div>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label style="font-weight: bold;">Пароль</label>
                    <div style="color: #888;">********</div>
                </div>
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <label style="font-weight: bold;">E-mail</label>
                    <div style="color: #888;">{{ $user->email }}</div>
                </div>
                <button type="button"
                        onclick="window.location.href='{{ route('profile.edit') }}'"
                        style="background: #C8E6C9; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer; align-self: flex-end;">
                    изменить
                </button>
            </form>
        </div>

        <!-- Баннер -->
        <div style="background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%); margin: 32px -24px -24px; padding: 24px; display: flex; align-items: center; gap: 24px; border-radius: 12px;">
            <div style="flex: 1;">
                <img src="{{ asset('images/cat_banner.jpg') }}" alt="Кот" style="width: 100%; border-radius: 12px;">
            </div>
            <div style="flex: 1; text-align: center;">
                <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">Ищем добрых людей!</h2>
                <p style="margin-bottom: 16px;">Наш приют предлагает возможность присоединиться к мероприятиям, где вы можете оказать помощь нашим четвероногим друзьям.</p>
                <button onclick="window.location.href='{{ route('events.index') }}'"
                        style="background: #C8E6C9; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">
                    посмотреть
                </button>
            </div>
        </div>
    </div>
@endsection
