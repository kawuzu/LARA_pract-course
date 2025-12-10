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

                @if($animal->photo_url)
                    <div style="margin:8px 0">
                        <img src="{{ $animal->photo_url }}" alt="{{ $animal->name }}" style="width:100%;height:160px;object-fit:cover;border-radius:6px;border:1px solid #eee" />
                    </div>
                @else
                    <div style="margin:8px 0">
                        <div style="width:100%;height:160px;display:flex;align-items:center;justify-content:center;background:#fafafa;border:1px dashed #eee;border-radius:6px;color:#999">
                            Нет фото
                        </div>
                    </div>
                @endif

                <p>{{ \Illuminate\Support\Str::limit($animal->description, 100) }}</p>
                <p><a class="btn" href="{{ route('animals.show', $animal) }}">Подробнее</a></p>
            </div>
        @endforeach
    </div>

    <div style="margin-top:16px">{{ $animals->links() }}</div>
@endsection
