@extends('layouts.app')

@section('title','Животное')

@section('content')
    <h1>{{ $animal->name ?? 'Без имени' }}</h1>

    <div style="display:flex;gap:16px;align-items:flex-start">
        <div style="flex:1">
            <div class="card">
                <p><strong>Вид:</strong> {{ $animal->species }}</p>
                <p><strong>Порода:</strong> {{ $animal->breed }}</p>
                <p><strong>Возраст:</strong> {{ $animal->age }}</p>
                <p><strong>Пол:</strong> {{ $animal->sex }}</p>
                <p><strong>Статус:</strong> {{ $animal->status }}</p>
            </div>
        </div>
        <div style="width:320px">
            <div class="card">
                <h4>Описание</h4>
                <p>{{ $animal->description }}</p>
                @if($animal->photo)
                    <div style="margin-top:12px">
                        <img src="{{ asset('storage/'.$animal->photo) }}" alt="" style="max-width:100%"/>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
