@extends('layouts.app')
@section('title','Животные')
@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px;">
        <h1>Животные в приюте</h1>
        <div style="display: flex; align-items: center; gap: 12px;">
            <span class="muted">фильтры</span>
            <button style="background: none; border: none; font-size: 1.2em; cursor: pointer;">☰</button>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 24px; margin-bottom: 32px;">
        @foreach($animals as $animal)
            <div style="border-radius: 12px; overflow: hidden; box-shadow: 0 4px 8px rgba(0,0,0,0.1); background: white;">
                <div style="position: relative;">
                    @if($animal->photo_url)
                        <img src="{{ $animal->photo_url }}" alt="{{ $animal->name }}" style="width: 100%; height: 240px; object-fit: cover;" />
                    @else
                        <div style="width: 100%; height: 240px; display: flex; align-items: center; justify-content: center; background: #f0f0f0; color: #999;">
                            Нет фото
                        </div>
                    @endif
                </div>
                <div style="padding: 16px;">
                    <h3 style="margin: 0 0 8px 0; font-size: 1.4em;">{{ $animal->name ?? 'Без имени' }}</h3>
                    <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 12px;">
                        @if($animal->gender === 'male')
                            <span style="color: #4285F4;">🐶</span>
                        @elseif($animal->gender === 'female')
                            <span style="color: #EA439B;">🐶</span>
                        @endif
                        <span style="color: #666; font-size: 0.9em;">{{ $animal->age ?? 'возраст неизвестен' }}</span>
                    </div>
                    <div style="display: flex; gap: 8px; margin-bottom: 12px; flex-wrap: wrap;">
                        <span style="background: #E3F2FD; color: #1976D2; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">{{ $animal->species }}</span>
                        <span style="background: #E3F2FD; color: #1976D2; padding: 4px 8px; border-radius: 12px; font-size: 0.8em;">{{ $animal->breed }}</span>
                    </div>
                    <p style="margin: 0 0 16px 0; color: #555; font-size: 0.95em;">{{ \Illuminate\Support\Str::limit($animal->description, 120) }}</p>
                    <a href="{{ route('animals.show', $animal) }}" style="display: inline-block; background: #4CAF50; color: white; text-decoration: none; padding: 10px 20px; border-radius: 6px; font-weight: 500;">Подробнее</a>
                </div>
            </div>
        @endforeach
    </div>

    <div style="margin-top: 16px;">{{ $animals->links() }}</div>

    <div style="background: linear-gradient(135deg, #87CEEB 0%, #E0F7FA 100%); padding: 32px; margin: 32px -24px -24px; border-radius: 12px; display: flex; align-items: center; gap: 32px;">
        <div style="flex: 1;">
            <img src="{{ asset('images/first_meeting_example.jpg') }}" alt="Первая встреча с питомцем" style="width: 100%; border-radius: 12px;">
        </div>
        <div style="flex: 1; text-align: center;">
            <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">впервые заводите питомца?</h2>
            <p style="font-size: 1.1em; margin-bottom: 24px;">У нас есть несколько советов, как найти общий язык с вашим первым хвостатым другом</p>
            <a href="#" style="display: inline-block; background: #8BC34A; color: white; text-decoration: none; padding: 12px 24px; border-radius: 6px; font-weight: 500; font-size: 1.1em;">посмотреть</a>
        </div>
    </div>
@endsection
