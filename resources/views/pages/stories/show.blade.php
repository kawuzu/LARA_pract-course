@extends('layouts.app')

@section('title', $story->title)

@section('content')
    <h1>{{ $story->title }}</h1>

    @if($story->photo)
        <img src="{{ asset('storage/' . $story->photo) }}" alt="{{ $story->title }}" style="width:100%;max-height:400px;object-fit:cover;margin-bottom:12px;">
    @endif

    <p>{{ $story->body }}</p>

    <a href="{{ route('stories.index') }}" class="btn" style="margin-top:12px;display:inline-block">Назад к списку историй</a>
@endsection
