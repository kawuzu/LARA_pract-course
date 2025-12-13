@extends('layouts.app')

@section('title', 'Профиль')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush

@section('content')
    <div class="profile-container">

        <!-- Аватар и имя -->
        <div class="profile-header">
            <div class="avatar">
                <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}" alt="Аватар">
            </div>
            <h1 class="profile-name">{{ $user->name }}</h1>
        </div>

        <!-- Мои мероприятия -->
        <div class="profile-events">
            <h2>Мои мероприятия</h2>
            @if($events->count() === 0)
                <p>Вы ещё не записаны ни на одно мероприятие.</p>
            @else
                <div class="events-list">
                    @foreach($events as $event)
                        <div class="event-item">
                            <div class="event-title">{{ $event->title }}</div>
                            <div class="event-date">
                                {{ \Carbon\Carbon::parse($event->date)->format('d.m.y') }}
                                {{ \Carbon\Carbon::parse($event->date)->format('H:i') }}
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <hr class="profile-separator">

        <!-- Данные профиля -->
        <div class="profile-data">
            <h2>Данные профиля</h2>
            <form action="{{ route('profile.update') }}" method="POST" class="profile-form">
                @csrf
                <div class="profile-field">
                    <label>Логин</label>
                    <div class="profile-value">{{ $user->name }}</div>
                </div>
                <div class="profile-field">
                    <label>Пароль</label>
                    <div class="profile-value">********</div>
                </div>
                <div class="profile-field">
                    <label>E-mail</label>
                    <div class="profile-value">{{ $user->email }}</div>
                </div>
            </form>
        </div>
    </div>
@endsection
