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

@endsection
