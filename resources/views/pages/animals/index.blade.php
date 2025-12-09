@extends('layouts.app')

@section('title','Животные')

@section('content')
    <h1>Животные в приюте</h1>

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
        <div class="muted">Всего: {{ $animals->total() }}</div>
    </div>

    <div class="grid">
        @foreach($animals as $animal)
            <div class="card">
                <h3>{{ $animal->name ?? 'Без имени' }}</h3>
                <p class="muted">{{ $animal->species }} — {{ $animal->breed }}</p>
                <p>{{ \Illuminate\Support\Str::limit($animal->description, 100) }}</p>
                <p><a class="btn" href="{{ route('animals.show', $animal) }}">Подробнее</a></p>
            </div>
        @endforeach
    </div>

    <div style="margin-top:16px">{{ $animals->links() }}</div>
@endsection
