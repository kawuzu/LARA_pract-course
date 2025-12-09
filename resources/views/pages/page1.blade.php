@extends('layouts.app')

@section('title','Страница 1 — Карточки')
@section('content')
    <h1>Карточки</h1>
    <div class="grid" style="margin-top:16px">
        @foreach($items as $item)
            <div class="card">
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->description }}</p>
            </div>
        @endforeach
    </div>
@endsection
