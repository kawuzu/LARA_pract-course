@extends('layouts.app')

@section('title','Добавить животное')

@section('content')
    <h1>Добавить животное</h1>

    @if ($errors->any())
        <div class="card" style="background:#ffecec;border-color:#f5c2c2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.animals.store') }}" enctype="multipart/form-data">
        @csrf
        <div style="margin-bottom:8px">
            <label>Имя</label>
            <input type="text" name="name" value="{{ old('name') }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Вид</label>
            <input type="text" name="species" value="{{ old('species') }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Порода</label>
            <input type="text" name="breed" value="{{ old('breed') }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Возраст</label>
            <input type="number" name="age" value="{{ old('age') }}" style="width:100%;padding:8px"/>
        </div>

        <div style="margin-bottom:8px">
            <label>Пол</label>
            <select name="sex" style="width:100%;padding:8px">
                <option value="unknown" {{ old('sex')=='unknown' ? 'selected':'' }}>Не указан</option>
                <option value="male" {{ old('sex')=='male' ? 'selected':'' }}>Мальчик</option>
                <option value="female" {{ old('sex')=='female' ? 'selected':'' }}>Девочка</option>
            </select>
        </div>

        <div style="margin-bottom:8px">
            <label>Статус</label>
            <select name="status" style="width:100%;padding:8px">
                <option value="available" {{ old('status')=='available' ? 'selected':'' }}>Доступен</option>
                <option value="adopted" {{ old('status')=='adopted' ? 'selected':'' }}>Усиновлён</option>
                <option value="fostered" {{ old('status')=='fostered' ? 'selected':'' }}>В передержке</option>
                <option value="not_available" {{ old('status')=='not_available' ? 'selected':'' }}>Недоступен</option>
            </select>
        </div>

        <div style="margin-bottom:8px">
            <label>Фото</label>
            <input type="file" name="photo" />
        </div>

        <div style="margin-bottom:8px">
            <label>Описание</label>
            <textarea name="description" style="width:100%;padding:8px">{{ old('description') }}</textarea>
        </div>

        <button class="btn" type="submit">Создать</button>
    </form>
@endsection
