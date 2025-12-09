@extends('layouts.app')

@section('title','Редактировать животное')

@section('content')
    <h1>Редактировать: {{ $animal->name ?? 'Без имени' }}</h1>

    @if ($errors->any())
        <div class="card" style="background:#ffecec;border-color:#f5c2c2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.animals.update', $animal) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="margin-bottom:8px">
            <label>Имя</label>
            <input type="text" name="name" value="{{ old('name', $animal->name) }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Вид</label>
            <input type="text" name="species" value="{{ old('species', $animal->species) }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Порода</label>
            <input type="text" name="breed" value="{{ old('breed', $animal->breed) }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Возраст</label>
            <input type="number" name="age" value="{{ old('age', $animal->age) }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Пол</label>
            <select name="sex" style="width:100%;padding:8px">
                <option value="unknown" {{ old('sex', $animal->sex)=='unknown' ? 'selected':'' }}>Не указан</option>
                <option value="male" {{ old('sex', $animal->sex)=='male' ? 'selected':'' }}>Мальчик</option>
                <option value="female" {{ old('sex', $animal->sex)=='female' ? 'selected':'' }}>Девочка</option>
            </select>
        </div>

        <div style="margin-bottom:8px">
            <label>Статус</label>
            <select name="status" style="width:100%;padding:8px">
                <option value="available" {{ old('status', $animal->status)=='available' ? 'selected':'' }}>Доступен</option>
                <option value="adopted" {{ old('status', $animal->status)=='adopted' ? 'selected':'' }}>Усиновлён</option>
                <option value="fostered" {{ old('status', $animal->status)=='fostered' ? 'selected':'' }}>В передержке</option>
                <option value="not_available" {{ old('status', $animal->status)=='not_available' ? 'selected':'' }}>Недоступен</option>
            </select>
        </div>

        <div style="margin-bottom:8px">
            <label>Фото</label>
            @if($animal->photo)
                <div style="margin-bottom:6px">
                    <img src="{{ asset('storage/'.$animal->photo) }}" alt="" style="max-width:160px;display:block;margin-bottom:6px;border:1px solid #eee;padding:6px;background:#fff"/>
                </div>
            @endif
            <input type="file" name="photo" />
        </div>

        <div style="margin-bottom:8px">
            <label>Описание</label>
            <textarea name="description" style="width:100%;padding:8px">{{ old('description', $animal->description) }}</textarea>
        </div>

        <button class="btn" type="submit">Сохранить</button>
    </form>
@endsection
