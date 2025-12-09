@extends('layouts.app')

@section('title','Управление животными')

@section('content')
    <h1>Животные (админ)</h1>

    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
        <div class="muted">Всего: {{ $animals->total() }}</div>
        <div><a class="btn" href="{{ route('admin.animals.create') }}">Добавить животное</a></div>
    </div>

    <table style="width:100%;border-collapse:collapse">
        <thead>
        <tr style="text-align:left">
            <th>#</th>
            <th>Имя</th>
            <th>Вид</th>
            <th>Статус</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr style="border-top:1px solid #eee">
                <td>{{ $animal->id }}</td>
                <td>{{ $animal->name }}</td>
                <td>{{ $animal->species }}</td>
                <td>{{ $animal->status }}</td>
                <td style="white-space:nowrap">
                    <a href="{{ route('admin.animals.show', $animal) }}" class="btn">Просмотр</a>
                    <a href="{{ route('admin.animals.edit', $animal) }}" class="btn">Редактировать</a>
                    <form action="{{ route('admin.animals.destroy', $animal) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn" type="submit" onclick="return confirm('Удалить?')">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div style="margin-top:12px">{{ $animals->links() }}</div>
@endsection
