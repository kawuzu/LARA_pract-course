@extends('layouts.app')
@section('title','Советы')
@section('content')
    <div style="background: white; padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h1 style="color: #2E8B57; font-size: 2.2em; text-align: center; margin-bottom: 16px;">впервые заводите питомца?</h1>
        <p style="text-align: center; font-size: 1.1em; color: #666; margin-bottom: 24px;">у нас есть несколько советов как найти общий язык с вашим первым хвостатым другом</p>

        <div style="text-align: center; margin: 24px 0;">
            <img src="{{ asset('images/man_with_cat_example.jpg') }}" alt="Человек с котом" style="max-width: 100%; height: auto; border-radius: 12px;">
        </div>
    </div>

    <div style="background: #f0f9f0; padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div class="accordion" id="adviceAccordion">
            @foreach($advices as $index => $advice)
                <div class="card" style="margin-bottom: 8px; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    <div
                        class="card-header"
                        style="cursor: pointer; padding: 16px; background: #E8F5E8; font-weight: bold; font-size: 1.1em;"
                        onclick="toggleAccordion({{ $index }})"
                    >
                        {{ $advice->title }}
                    </div>
                    <div
                        id="advice-body-{{ $index }}"
                        class="card-body"
                        style="display: none; padding: 16px; background: white; border-top: 1px solid #eee; color: #333;"
                    >
                        {!! nl2br(e($advice->content)) !!}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div style="background: white; padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">считаете что не готовы к питомцу, но хотите помочь?</h2>
        <p style="font-size: 1.1em; color: #666; margin-bottom: 24px;">тогда вы можете</p>

        <div style="display: flex; justify-content: center; gap: 48px; align-items: center; margin-bottom: 24px;">
            <div style="text-align: center;">
                <div style="font-size: 3em; margin-bottom: 8px;">👍</div>
            </div>
            <div style="font-size: 2em; color: #888;">ИЛИ</div>
            <div style="text-align: center;">
                <div style="font-size: 3em; margin-bottom: 8px;">😊</div>
            </div>
        </div>

        <div style="display: flex; justify-content: center; gap: 48px;">
            <div style="text-align: center; max-width: 300px;">
                <h3 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 8px;">пожертвовать</h3>
            </div>
            <div style="text-align: center; max-width: 300px;">
                <h3 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 8px;">стать волонтёром</h3>
            </div>
        </div>
    </div>

    <div style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('images/cat_closeup_example.jpg') }}'); background-size: cover; background-position: center; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; color: white; display: flex; justify-content: space-between; align-items: center;">
        <div style="flex: 1; text-align: left;">
            <h2 style="font-size: 2em; margin-bottom: 16px;">Ищем добрых людей!</h2>
            <p style="font-size: 1.1em; margin-bottom: 16px;">Наш приют предлагает возможность присоединиться к мероприятиям, где вы можете оказать помощь нашим четвероногим друзьям.</p>
            <button style="background: #8BC34A; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">посмотреть</button>
        </div>
    </div>

    <div style="margin-top: 12px; text-align: center;">
        {{ $advices->links() }}
    </div>

    <script>
        function toggleAccordion(index) {
            const el = document.getElementById('advice-body-' + index);
            if (el.style.display === 'none' || el.style.display === '') {
                el.style.display = 'block';
            } else {
                el.style.display = 'none';
            }
        }
    </script>
@endsection
