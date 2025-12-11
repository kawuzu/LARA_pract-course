@extends('layouts.app')

@section('title','Потеряшки / Найдёныши')

@section('content')
    <h1>Потеряшки / Найдёныши</h1>

    <div style="margin-bottom:16px">
        <button class="btn" onclick="document.getElementById('modal-lost').style.display='block'">У меня потеряшка</button>
        <button class="btn" onclick="document.getElementById('modal-found').style.display='block'">У меня найдёныш</button>
    </div>

    @if(session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    <!-- Модалка "Потеряшка" -->
    <div id="modal-lost" class="modal" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:1000">
        <div style="background:#fff;border-radius:8px;max-width:720px;margin:70px auto;padding:20px;position:relative">
            <button onclick="document.getElementById('modal-lost').style.display='none'" style="position:absolute;right:12px;top:12px">✕</button>
            <h2>У меня потеряшка</h2>

            <form method="POST" action="{{ route('lost_reports.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="lost">

                <div style="margin-bottom:8px"><label>Имя питомца</label>
                    <input type="text" name="name" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Вид</label>
                    <input type="text" name="species" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Порода</label>
                    <input type="text" name="breed" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Возраст</label>
                    <input type="number" name="age" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Местоположение</label>
                    <input type="text" name="location" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Описание</label>
                    <textarea name="description" style="width:100%;padding:8px"></textarea></div>
                <div style="margin-bottom:8px"><label>Фото</label>
                    <input type="file" name="photo"></div>

                <button class="btn" type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <!-- Модалка "Найдёныш" -->
    <div id="modal-found" class="modal" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:1000">
        <div style="background:#fff;border-radius:8px;max-width:720px;margin:70px auto;padding:20px;position:relative">
            <button onclick="document.getElementById('modal-found').style.display='none'" style="position:absolute;right:12px;top:12px">✕</button>
            <h2>У меня найдёныш</h2>

            <form method="POST" action="{{ route('lost_reports.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="found">

                <div style="margin-bottom:8px"><label>Имя питомца</label>
                    <input type="text" name="name" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Вид</label>
                    <input type="text" name="species" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Порода</label>
                    <input type="text" name="breed" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Возраст</label>
                    <input type="number" name="age" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Местоположение</label>
                    <input type="text" name="location" style="width:100%;padding:8px"></div>
                <div style="margin-bottom:8px"><label>Описание</label>
                    <textarea name="description" style="width:100%;padding:8px"></textarea></div>
                <div style="margin-bottom:8px"><label>Фото</label>
                    <input type="file" name="photo"></div>

                <button class="btn" type="submit">Отправить</button>
            </form>
        </div>
    </div>

    <!-- Список заявок (для проверки) -->
    <h2>Потеряшки</h2>
    @foreach($lostReports as $report)
        <div class="card" style="margin-bottom:8px">
            <strong>{{ $report->name ?? 'Без имени' }}</strong> — {{ $report->species }} / {{ $report->location }}
        </div>
    @endforeach

    <h2>Найдёныши</h2>
    @foreach($foundReports as $report)
        <div class="card" style="margin-bottom:8px">
            <strong>{{ $report->name ?? 'Без имени' }}</strong> — {{ $report->species }} / {{ $report->location }}
        </div>
    @endforeach

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


@endsection
