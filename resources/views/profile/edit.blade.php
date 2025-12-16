@extends('layouts.app')

@section('title', 'Профиль')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
    <div class="profile-container">

        <div class="profile-header">
            <div class="avatar">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}" alt="Аватар">
            </div>

            <div>
                <h1 class="profile-name">{{ $user->name }}</h1>

                <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="avatar" required>
                    <button type="submit">Сменить аватар</button>
                </form>
            </div>
        </div>

        <div class="profile-events">
            <h2>Мои мероприятия</h2>

            @if($events->isEmpty())
                <p>Вы ещё не записаны ни на одно мероприятие.</p>
            @else
                <div class="events-list">
                    @foreach($events as $event)
                        <div class="event-item">
                            <div class="event-title">{{ $event->title }}</div>
                            <div class="event-date">
                                {{ \Carbon\Carbon::parse($event->starts_at)->format('d.m.Y H:i') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <hr class="profile-separator">

        <div class="profile-data">
            <h2>Данные профиля</h2>

            <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                @csrf

                <div class="profile-field">
                    <label>Логин</label>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>

                <div class="profile-field">
                    <label>E-mail</label>
                    <input type="email" name="email" value="{{ $user->email }}">
                </div>
                <button type="submit">Сохранить изменения</button>
            </form>
        </div>

        <hr class="profile-separator">

        <div class="profile-data">
            <h2>Смена пароля</h2>

            <form action="{{ route('profile.password') }}" method="POST" class="profile-form">
                @csrf

                <div class="profile-field">
                    <label>Новый пароль</label>
                    <input type="password" name="password">
                </div>

                <div class="profile-field">
                    <label>Подтверждение</label>
                    <input type="password" name="password_confirmation">
                </div>

                <button type="submit">Изменить пароль</button>
            </form>
        </div>
    </div>
@endsection
