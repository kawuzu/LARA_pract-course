@extends('layouts.app')

@section('title','Истории усыновления')
<link rel="stylesheet" href="{{ asset('css/stories.css') }}">
@section('content')
    <h1>Истории</h1>

    @foreach($stories as $story)
        <div class="card">
            <a href="{{ route('stories.show', $story) }}">
                <img src="{{ asset('images/story2.jpg'.$story->image) }}" alt="{{ $story->title }}">
                <h3>{{ $story->title }}</h3>
            </a>

            <p>{{ \Illuminate\Support\Str::limit($story->body, 300) }}</p>
        </div>
    @endforeach

    <div style="margin-top:12px">{{ $stories->links() }}</div>
@endsection
