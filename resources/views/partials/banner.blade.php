@isset($banner)
    @if($banner->type === 'full_bg')
        <a href="{{ $banner->link }}" class="banner full-bg" style="display:block;position:relative;background:url('{{ $banner->image }}') center/cover no-repeat;padding:60px 20px;text-align:center;color:#fff;text-decoration:none;">
            <h2>{{ $banner->title }}</h2>
            <p>{{ $banner->subtitle }}</p>
            <span class="btn" style="margin-top:12px;background:#fff;color:#000;padding:8px 16px;border-radius:6px;display:inline-block">Перейти</span>
        </a>
    @elseif($banner->type === 'split_bg')
        <a href="{{ $banner->link }}" class="banner split-bg" style="display:flex;align-items:center;margin:20px 0;text-decoration:none;">
            <div style="    font-family: system-ui, Arial, sans-serif;
    display: flex;
    height: 290px;
    flex: 1;
    padding: 20px;
    background: #4DC5FF;
    color: #fff;
    flex-direction: column;
    align-items: center;
    justify-content: center;">
                <h2>{{ $banner->title }}</h2>
                <p>{{ $banner->subtitle }}</p>
                <span class="btn" style="margin-top:12px;background:#b6efb6;color:#000;padding:8px 16px;border-radius:6px;display:inline-block">Посмотреть</span>
            </div>
            <div style="flex:1;">
                <img src="{{ $banner->image }}" alt="{{ $banner->title }}" style="width:100%;height:100%;object-fit:cover;border-radius:0 8px 8px 0">
            </div>
        </a>
    @elseif($banner->type === 'lost' || $banner->type === 'event')
        <a href="{{ $banner->link }}" class="banner simple-bg" style="display:block;position:relative;background:url('{{ $banner->image }}') center/cover no-repeat;padding:40px 20px;text-align:center;color:#fff;text-decoration:none;">
            <h2>{{ $banner->title }}</h2>
            <p>{{ $banner->subtitle }}</p>
            <span class="btn" style="margin-top:12px;background:#fff;color:#000;padding:8px 16px;border-radius:6px;display:inline-block">Перейти</span>
        </a>
    @endif
@endisset
