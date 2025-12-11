@extends('layouts.app')

@section('title',$animal->name ?? 'Животное')

@section('content')
    <h1>{{ $animal->name ?? 'Без имени' }}</h1>
    <div style="display:flex;gap:16px;align-items:flex-start">
        <div style="flex:1">
            <div class="card">
{{--                <p><strong>Вид:</strong> {{ $animal->species }}</p>--}}
                <p><strong>Порода:</strong> {{ $animal->breed }}</p>
                <p><strong>Возраст:</strong> {{ $animal->age }}</p>
                <p><strong>Пол:</strong> {{ $animal->sex }}</p>
                <p><strong>Статус:</strong> {{ $animal->status }}</p>
            </div>
        </div>

        <div style="width:360px">
            <div class="card">
                @if($animal->photo_url)
                    <div style="margin-bottom:12px">
                        <img src="{{ $animal->photo_url }}" alt="{{ $animal->name }}" style="width:100%;height:auto;display:block;border:1px solid #eee;padding:6px;background:#fff;border-radius:6px"/>
                    </div>
                @endif

                <h4>Описание</h4>
                <p>{{ $animal->description }}</p>
            </div>
        </div>
    </div>
@endsection
