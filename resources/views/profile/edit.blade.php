@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Профиль</h1>

        <!-- Аватар -->
        <div>
            <h3>Аватар</h3>

            <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}"
                 width="150" class="rounded-circle mb-3">

            <form action="{{ route('profile.avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="avatar" class="form-control mb-2">
                <button class="btn btn-primary">Обновить аватар</button>
            </form>
        </div>

        <hr>

        <!-- Данные профиля -->
        <h3>Данные аккаунта</h3>

        <form action="{{ route('profile.update') }}" method="POST">
            @csrf
            <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">
            <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-2">
            <button class="btn btn-success">Обновить</button>
        </form>

        <hr>

        <!-- Пароль -->
        <h3>Изменение пароля</h3>

        <form action="{{ route('profile.password') }}" method="POST">
            @csrf
            <input type="password" name="password" placeholder="Новый пароль" class="form-control mb-2">
            <input type="password" name="password_confirmation" placeholder="Повторите пароль" class="form-control mb-2">
            <button class="btn btn-warning">Изменить пароль</button>
        </form>
    </div>

    <h2 class="text-xl font-bold mb-4">Ваши мероприятия</h2>

    @if($events->count() === 0)
        <p>Вы ещё не записаны ни на одно мероприятие.</p>
    @else
        <ul class="space-y-2">
            @foreach($events as $event)
                <li class="p-4 border rounded-lg">
                    <h3 class="font-semibold text-lg">{{ $event->title }}</h3>
                    <p>{{ $event->date }}</p>
                </li>
            @endforeach
        </ul>
    @endif

@endsection
