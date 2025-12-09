@extends('layouts.app')

@section('title','Админ-панель')

@section('content')
    <h1>Админ-панель</h1>
    <div style="display:flex;gap:12px;flex-wrap:wrap">
        <a class="btn" href="{{ route('admin.animals.index') }}">Управление животными</a>
        <a class="btn" href="{{ route('dashboard') }}">Пользователи</a>
    </div>
@endsection
