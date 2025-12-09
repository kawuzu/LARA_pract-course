@extends('layouts.app')

@section('title','Страница 2 — Список')
@section('content')
    <h1>Список</h1>
    <ul style="margin-top:16px">
        @foreach($items as $item)
            <li><strong>{{ $item->title }}</strong> — {{ $item->description }}</li>
        @endforeach
    </ul>
@endsection
