@extends('layouts.app')

@section('title','Советы')

@section('content')
    <h1>Советы</h1>

    <div class="accordion" id="adviceAccordion" style="margin-top:12px">
        @foreach($advices as $index => $advice)
            <div class="card" style="margin-bottom:8px">
                <div class="card-header" style="cursor:pointer;padding:10px;background:#f1f1f1" onclick="toggleAccordion({{ $index }})">
                    <strong>{{ $advice->title }}</strong>
                </div>
                <div id="advice-body-{{ $index }}" class="card-body" style="display:none;padding:10px;border-top:1px solid #eee">
                    {{ $advice->content }}
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function toggleAccordion(index){
            const el = document.getElementById('advice-body-' + index);
            if(el.style.display === 'none' || el.style.display === ''){
                el.style.display = 'block';
            } else {
                el.style.display = 'none';
            }
        }
    </script>

    <div style="margin-top:12px">{{ $advices->links() }}</div>
@endsection
