@extends('layouts.app')

@section('content')
    <div class="container py-4">

        <h1 class="mb-4">Профиль пользователя</h1>

        {{-- СООБЩЕНИЕ УСПЕХА --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            {{-- Левая колонка: Аватар + краткие данные --}}
            <div class="col-md-4">
                <div class="card p-3">
                    <div class="text-center">
                        <img src="{{ $user->avatar ? asset('storage/'.$user->avatar) : 'https://via.placeholder.com/150' }}"
                             class="rounded-circle mb-3"
                             width="150" height="150">

                        <h4>{{ $user->name }}</h4>
                        <p class="text-muted">{{ $user->email }}</p>
                    </div>
                </div>

                {{-- Мероприятия --}}
                <div class="card mt-4">
                    <div class="card-header">
                        Мои мероприятия
                    </div>
                    <div class="card-body">
                        @if($events->count())
                            <ul class="list-group">
                                @foreach($events as $event)
                                    <li class="list-group-item">
                                        {{ $event->title }}
                                        <br>
                                        <small class="text-muted">{{ $event->date }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">Вы не записаны ни на одно мероприятие.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Правая колонка --}}
            <div class="col-md-8">
                <div class="card p-4">

                    <h3>Редактирование профиля</h3>

                    <form method="POST" enctype="multipart/form-data" action="{{ route('profile.update') }}">
                        @csrf

                        {{-- Имя --}}
                        <div class="mb-3">
                            <label class="form-label">Имя</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                        </div>

                        {{-- Аватар --}}
                        <div class="mb-3">
                            <label class="form-label">Аватар</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>

                        <button class="btn btn-primary">Сохранить</button>
                    </form>

                    <hr>

                    <h3>Смена пароля</h3>

                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Новый пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Подтверждение пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>

                        <button class="btn btn-warning">Обновить пароль</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
