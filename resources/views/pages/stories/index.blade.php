@extends('layouts.app')

@section('title','Истории усыновления')

@section('content')
    <h1>Истории</h1>

    @foreach($stories as $story)
        <div class="card" style="margin-bottom:12px">
            <h3>{{ $story->title }}</h3>
            <p class="muted">Автор: {{ $story->user ? $story->user->name : 'Гость' }}</p>
            <p>{{ \Illuminate\Support\Str::limit($story->body, 300) }}</p>
        </div>
    @endforeach

    <div style="margin-top:12px">{{ $stories->links() }}</div>
@endsection
