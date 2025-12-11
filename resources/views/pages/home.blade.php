@extends('layouts.app')

@section('title','Главная')

@section('content')
    <h1>Главная</h1>

    <section style="margin-top:24px; padding:12px; border:1px solid #ddd; border-radius:8px; background:#f9f9f9">
        <h2>Найти животное по местоположению</h2>
        <p>Введите город или район:</p>

        <form action="{{ route('animals.search') }}" method="GET" style="display:flex;gap:8px; flex-wrap:wrap; align-items:flex-end">
            <div style="flex:1; min-width:200px;">
                <input type="text" name="location" placeholder="Город или район" style="width:100%; padding:8px" value="{{ request('location') }}">
            </div>
            <button type="submit" class="btn">Вперёд!</button>
        </form>
    </section>

    <section style="margin-top:24px">
        <h2>Истории усыновления</h2>
        <div class="grid" style="grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:12px">
            @foreach(\App\Models\Story::with('user')->take(6)->get() as $story)
                <a href="{{ route('stories.show', $story) }}" style="text-decoration:none;color:inherit;">
                    <div class="card" style="position:relative;overflow:hidden;">
                        @if($story->photo)
                            <img src="{{ asset('storage/' . $story->photo) }}" alt="{{ $story->title }}" style="width:100%;height:200px;object-fit:cover;transition:0.3s" class="story-img">
                        @else
                            <div style="width:100%;height:200px;background:#ccc;display:flex;align-items:center;justify-content:center;">
                                Нет изображения
                            </div>
                        @endif
                        <div class="overlay" style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.4);opacity:0;transition:0.3s;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:bold;text-align:center;padding:8px;">
                            {{ $story->title }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    @push('styles')
        <style>
            .card:hover .overlay {
                opacity: 1;
            }
            .card:hover img {
                transform: scale(1.05);
            }
        </style>
    @endpush

    {{-- Баннер --}}
    @include('partials.banner', ['banner' => \App\Models\Banner::inRandomOrder()->first()])
@endsection
