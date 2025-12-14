@extends('layouts.app')
@section('title','Потеряшки / Найдёныши')
@section('content')
    <div style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); padding: 24px; text-align: center;">
        <h1 style="color: #333; font-size: 2.5em; margin-bottom: 16px;">Потеряли или нашли питомца? Мы готовы помочь!</h1>
        <div style="display: flex; justify-content: center; gap: 16px; margin-bottom: 24px;">
            <button
                onclick="document.getElementById('modal-lost').style.display='block'"
                style="background: #4285F4; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">
                У меня потеряшка
            </button>
            <button
                onclick="document.getElementById('modal-found').style.display='block'"
                style="background: #4285F4; color: white; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">
                У меня найдёныш
            </button>
        </div>
        <div style="position: relative; max-width: 800px; margin: 0 auto;">
            <img
                src="{{ asset('images/lost_found_pets_banner.jpg') }}"
                alt="Потеряшки и найдёныши"
                style="width: 100%; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);">
        </div>
    </div>

    <div style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <div style="margin-bottom: 32px;">
            <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">для потеряшек</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">💬</div>
                    <p><strong>Сообщите о своём потерянном питомце.</strong><br>Перед тем, как сообщить о своём потерянном питомце, подготовьте его фотографию, чтобы его мог увидеть как можно больше людей.</p>
                </div>
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">🔄</div>
                    <p><strong>Будьте начеку.</strong><br>Прикрепите соседи, чтобы они помогли вам следить за ситуацией, и разместите объявление в социальных сетях, чтобы расширить охват.</p>
                </div>
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">📢</div>
                    <p><strong>Проверьте чип.</strong><br>Проверьте информацию о микрочипе вашего питомца, а затем выполните поиск.</p>
                </div>
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">📍</div>
                    <p><strong>Поиск в вашем районе.</strong><br>Подайте заявление о пропаже животного и оповестите ветеринарные клиники в окрестностях.</p>
                </div>
            </div>
        </div>

        <div>
            <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">для найдёнышей</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">⭐</div>
                    <p><strong>Сообщите о питомце.</strong><br>Сообщите о найденном питомце с фотографией, чтобы его мог увидеть как можно больше людей.</p>
                </div>
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">🔍</div>
                    <p><strong>Ищите бирки.</strong><br>Просмотрите, нет ли бирки на ошейнике с контактной информацией. Очень часто животное можно быстро вернуть владельцу.</p>
                </div>
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">📋</div>
                    <p><strong>Оповестите окружающих.</strong><br>Разместите объявление на нашем сайте и сообщите, что вы нашли потерявшегося питомца.</p>
                </div>
                <div style="text-align: center; padding: 16px;">
                    <div style="font-size: 3em; margin-bottom: 8px;">💬</div>
                    <p><strong>Общитесь.</strong><br>Поговорите с соседями и всеми, кто может знать владельца животного.</p>
                </div>
            </div>
        </div>
    </div>

    <div style="background: linear-gradient(135deg, #87CEEB 0%, #E0F7FA 100%); padding: 24px; margin: 24px auto; max-width: 1200px; border-radius: 12px; display: flex; justify-content: space-between; align-items: center;">
        <div style="flex: 1; padding: 16px; text-align: center;">
            <h3 style="color: #2E8B57; font-size: 1.6em; margin-bottom: 16px;">Ищем добрых людей!</h3>
            <p style="margin-bottom: 16px;">Наш приют предлагает возможность присоединиться к мероприятиям, где вы можете оказать помощь нашим четвероногим друзьям.</p>
            <button style="background: #FFD700; color: #333; border: none; padding: 12px 24px; border-radius: 8px; font-size: 1em; cursor: pointer;">посмотреть</button>
        </div>
        <div style="flex: 1;">
            <img src="{{ asset('images/shelter_cat_example.jpg') }}" alt="Кот из приюта" style="width: 100%; border-radius: 12px;">
        </div>
    </div>

    <div style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">ЧаВо</h2>
        <div style="background: #E8F5E9; padding: 16px; border-radius: 8px; margin-bottom: 16px;">
            <p>Как часто обновляются данные о найденных питомцах?</p>
        </div>
        <div style="background: #E8F5E9; padding: 16px; border-radius: 8px; margin-bottom: 16px;">
            <p>Как я могу узнать, не нашёлся ли мой питомец?</p>
        </div>
        <div style="background: #E8F5E9; padding: 16px; border-radius: 8px; margin-bottom: 16px;">
            <p>Как долго я могу держать найденного питомца у себя?</p>
        </div>
        <div style="background: #E8F5E9; padding: 16px; border-radius: 8px; margin-bottom: 16px;">
            <p>Где я могу искать информацию о потерявшихся животных?</p>
        </div>
        <div style="background: #E8F5E9; padding: 16px; border-radius: 8px;">
            <p>Что делать, если я нашел потерянного питомца?</p>
        </div>
    </div>

    <div id="modal-lost" class="modal" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:1000;">
        <div style="background:#fff;border-radius:12px;max-width:720px;margin:70px auto;padding:32px;position:relative;box-shadow: 0 4px 16px rgba(0,0,0,0.2);">
            <button onclick="document.getElementById('modal-lost').style.display='none'" style="position:absolute;right:20px;top:20px;background:none;border:none;font-size:1.8em;cursor:pointer;color:#666;">✕</button>
            <h2 style="color: #1E90FF; font-size: 2em; margin-bottom: 24px; text-align: center;">Кого вы потеряли?</h2>
            <form method="POST" action="{{ route('lost_reports.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="lost">
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">как зовут питомца?</label>
                    <input type="text" name="name" placeholder="Введите имя питомца" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;">
                </div>
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">возраст питомца</label>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #1E90FF; background: #E6F2FF; color: #1E90FF; cursor: pointer;">котёнок</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">юниор</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">взрослый</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">зрелый</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">пожилой</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">старый</button>
                    </div>
                </div>
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">пол питомца</label>
                    <div style="display: flex; gap: 12px;">
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #FF69B4; background: #FFE6F0; color: #FF69B4; cursor: pointer;">девочка</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">мальчик</button>
                    </div>
                </div>
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">примерный адрес потери</label>
                    <input type="text" name="location" placeholder="Укажите место на карте" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;">
                </div>
                <button type="submit" style="width: 100%; background: #8BC34A; color: white; border: none; padding: 14px; border-radius: 8px; font-size: 1.1em; cursor: pointer; margin-top: 16px;">отправить</button>
            </form>
        </div>
    </div>

    <div id="modal-found" class="modal" style="display:none;position:fixed;left:0;top:0;width:100%;height:100%;background:rgba(0,0,0,0.6);z-index:1000;">
        <div style="background:#fff;border-radius:12px;max-width:720px;margin:70px auto;padding:32px;position:relative;box-shadow: 0 4px 16px rgba(0,0,0,0.2);">
            <button onclick="document.getElementById('modal-found').style.display='none'" style="position:absolute;right:20px;top:20px;background:none;border:none;font-size:1.8em;cursor:pointer;color:#666;">✕</button>
            <h2 style="color: #1E90FF; font-size: 2em; margin-bottom: 24px; text-align: center;">Кого вы нашли?</h2>
            <form method="POST" action="{{ route('lost_reports.store') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="type" value="found">
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">как зовут питомца? (если известно)</label>
                    <input type="text" name="name" placeholder="Введите имя питомца" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;">
                </div>
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">возраст питомца</label>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #1E90FF; background: #E6F2FF; color: #1E90FF; cursor: pointer;">котёнок</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">юниор</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">взрослый</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">зрелый</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">пожилой</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">старый</button>
                    </div>
                </div>
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">пол питомца</label>
                    <div style="display: flex; gap: 12px;">
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #ddd; background: #f9f9f9; color: #555; cursor: pointer;">девочка</button>
                        <button type="button" style="padding: 8px 16px; border-radius: 20px; border: 1px solid #1E90FF; background: #E6F2FF; color: #1E90FF; cursor: pointer;">мальчик</button>
                    </div>
                </div>
                <div style="margin-bottom: 24px;">
                    <label style="display: block; margin-bottom: 8px; font-weight: bold; color: #555;">примерный адрес находки</label>
                    <input type="text" name="location" placeholder="Укажите место на карте" style="width:100%;padding:12px;border:1px solid #ddd;border-radius:8px;background:#f9f9f9;">
                </div>
                <button type="submit" style="width: 100%; background: #8BC34A; color: white; border: none; padding: 14px; border-radius: 8px; font-size: 1.1em; cursor: pointer; margin-top: 16px;">отправить</button>
            </form>
        </div>
    </div>

    <div style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">Потеряшки</h2>
        @foreach($lostReports as $report)
            <div style="margin-bottom: 16px; padding: 16px; border: 1px solid #ddd; border-radius: 8px;">
                <strong>{{ $report->name ?? 'Без имени' }}</strong> — {{ $report->species }} / {{ $report->location }}
            </div>
        @endforeach
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">Найдёныши</h2>
        @foreach($foundReports as $report)
            <div style="margin-bottom: 16px; padding: 16px; border: 1px solid #ddd; border-radius: 8px;">
                <strong>{{ $report->name ?? 'Без имени' }}</strong> — {{ $report->species }} / {{ $report->location }}
            </div>
        @endforeach
    </div>

    <section style="background: white; padding: 32px; margin: 24px auto; max-width: 1200px; border-radius: 12px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
        <h2 style="color: #2E8B57; font-size: 1.8em; margin-bottom: 16px;">ваши истории</h2>
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 16px;">
            @foreach(\App\Models\Story::with('user')->take(6)->get() as $story)
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
@endsection
