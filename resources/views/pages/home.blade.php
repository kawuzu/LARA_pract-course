@extends('layouts.app')
@section('title','Главная')
@section('content')
    <div style="background: linear-gradient(135deg, #87CEEB 0%, #E0F7FA 100%); padding: 24px; text-align: center; color: #333;">
        <h1 style="color: #2E8B57; font-size: 2.5em; margin-bottom: 16px;">Любовь спасает жизни!</h1>
        <p style="font-size: 1.2em; margin-bottom: 24px;">Мы помогаем бездомным животным находить заботливые дома.<br>Присоединяйтесь к нашей миссии — создадим лучшее будущее вместе!</p>
    </div>

    <div style="background: white; padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); display: flex; align-items: center; gap: 24px;">
        <div style="flex: 1;">
            <img src="{{ asset('images/kitten_example.jpg') }}" alt="Котёнок" style="width: 100%; border-radius: 12px;">
        </div>
        <div style="flex: 1; padding: 16px;">
            <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">Ваша история начинается здесь!</h2>
            <p style="font-size: 1.1em; margin-bottom: 16px;">Откройте дверь своему новому четвероногому другу уже сегодня!</p>
            <form action="{{ route('animals.search') }}" method="GET" style="display: flex; gap: 8px; flex-wrap: wrap; align-items: flex-end;">
                <div style="flex: 1; min-width: 200px;">
                    <input type="text" name="location" placeholder="Где вы находитесь?" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;" value="{{ request('location') }}">
                </div>
                <button type="submit" style="background: #4CAF50; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">вперёд!</button>
            </form>
        </div>
    </div>

    <div style="background: #f9f9f9; padding: 32px; text-align: center; margin: 24px auto; max-width: 1200px; border-radius: 12px;">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 24px;">как ещё можно помочь?</h2>
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
                <p>Финансовая поддержка поможет приюту обеспечить корм и лечение бездомным кошкам.</p>
            </div>
            <div style="text-align: center; max-width: 300px;">
                <h3 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 8px;">стать волонтёром</h3>
                <p>Помогите в уходе за животными и участвуйте в новых проектах приюта!</p>
            </div>
        </div>
    </div>

    <div style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); text-align: center;">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">Потеряли питомца?</h2>
        <div style="display: flex; justify-content: center; gap: 24px; align-items: center;">
            <div style="flex: 1;">
                <img src="{{ asset('images/lost_cat_example.jpg') }}" alt="Потерялся кот" style="width: 100%; border-radius: 12px;">
                <p style="margin-top: 8px; font-weight: bold;">Пропал кот!!!</p>
            </div>
            <div style="flex: 1;">
                <button style="background: #8BC34A; color: white; border: none; padding: 16px 32px; border-radius: 8px; font-size: 1.2em; cursor: pointer;">Да!</button>
            </div>
        </div>
    </div>

    <section style="margin-top: 24px; padding: 24px; background: white; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 1200px; margin: 24px auto;">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">ваши истории</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 16px;">
            @foreach(\App\Models\Story::with('user')->take(4)->get() as $story)
                <a href="{{ route('stories.show', $story) }}" style="text-decoration: none; color: inherit;">
                    <div style="position: relative; overflow: hidden; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        @if($story->photo)
                            <img src="{{ asset('storage/' . $story->photo) }}" alt="{{ $story->title }}" style="width: 100%; height: 200px; object-fit: cover; transition: 0.3s; border-radius: 12px;">
                        @else
                            <div style="width: 100%; height: 200px; background: #ccc; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                Нет изображения
                            </div>
                        @endif
                        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.4); opacity: 0; transition: 0.3s; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: bold; text-align: center; padding: 8px; border-radius: 12px;">
                            {{ $story->title }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <div style="background: linear-gradient(135deg, #87CEEB 0%, #E0F7FA 100%); padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
        <div style="flex: 1;">
            <img src="{{ asset('images/map_example.png') }}" alt="Карта приютов" style="width: 100%; border-radius: 12px;">
        </div>
        <div style="flex: 1; padding: 16px; text-align: center;">
            <h3 style="color: #2E8B57; font-size: 1.4em; margin-bottom: 16px;">будьте в курсе наших новостей</h3>
            <form style="display: flex; gap: 8px; flex-wrap: wrap; align-items: flex-end;">
                <div style="flex: 1; min-width: 200px;">
                    <input type="email" placeholder="адрес вашей почты" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 8px;">
                </div>
                <button type="submit" style="background: #8BC34A; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">отправить</button>
            </form>
        </div>
    </div>

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

    @include('partials.banner', ['banner' => \App\Models\Banner::inRandomOrder()->first()])
@endsection
