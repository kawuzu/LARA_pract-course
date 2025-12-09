@extends('layouts.app')

@section('title','Советы')

@section('content')
    <h1>Советы</h1>

    @foreach($advices as $advice)
        <div class="card" style="margin-bottom:12px">
            <h3>{{ $advice->title }}</h3>
            <p>{{ $advice->content }}</p>
        </div>
    @endforeach

    <div style="margin-top:12px">{{ $advices->links() }}</div>
@endsection
