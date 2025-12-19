@extends('layouts.app')
@section('title','Советы')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/advice.css') }}">
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

    <section class="home-help">
        <h2>как ещё можно помочь?</h2>

        <div class="help-grid">
            <div class="help-item">
                <img src="{{ asset('images/help-donate.svg') }}">
                <h3>пожертвовать</h3>
                <p>
                    Финансовая поддержка поможет приюту обеспечить корм и лечение
                    бездомным кошкам.
                </p>
            </div>

            <div class="help-divider">или</div>

            <div class="help-item">
                <img src="{{ asset('images/help-volunteer.svg') }}">
                <h3>стать волонтёром</h3>
                <p>
                    Помогите в уходе за животными и участвуйте в новых проектах приюта!
                </p>
            </div>
        </div>
    </section>

    @include('partials.banner', ['banner' => \App\Models\Banner::inRandomOrder()->first()])

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
