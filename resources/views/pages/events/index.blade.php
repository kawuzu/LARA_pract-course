@extends('layouts.app')

@section('title','Мероприятия')

@section('content')
    <h1>Мероприятия</h1>
    <div class="grid" style="grid-template-columns:repeat(auto-fill,minmax(300px,1fr))">
        @foreach($events as $event)
            <div class="card">
                <h3>{{ $event->title }}</h3>
                <p class="muted">{{ $event->starts_at ? $event->starts_at->format('d.m.Y H:i') : '' }} — {{ $event->location }}</p>
                <p>{{ \Illuminate\Support\Str::limit($event->description, 160) }}</p>
            </div>
        @endforeach
    </div>
    <div style="margin-top:16px">{{ $events->links() }}</div>
@endsection
