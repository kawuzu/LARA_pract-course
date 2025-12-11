@extends('layouts.app')

@section('title','Истории усыновления')

@section('content')
    <h1>Истории</h1>

    @foreach($stories as $story)
        <div class="card" style="margin-bottom:12px">
            <a href="{{ route('stories.show', $story) }}">
                <h3>{{ $story->title }}</h3>
            </a>
            <p>{{ \Illuminate\Support\Str::limit($story->body, 300) }}</p>
        </div>
    @endforeach

    <div style="margin-top:12px">{{ $stories->links() }}</div>
@endsection
