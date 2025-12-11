<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner;

class BannerSeeder extends Seeder
{
    public function run()
    {
        Banner::factory()->count(4)->create([
            'title' => 'Советы для питомцев',
            'subtitle' => 'Читайте полезные советы для ухода за животными',
            'image' => '/images/banner1.jpg',
            'link' => route('advices.index',),
            'type' => 'full_bg',
        ]);

        Banner::factory()->create([
            'title' => 'Ближайшие мероприятия',
            'subtitle' => 'Узнайте, где проходят события приюта',
            'image' => '/images/banner2.jpg',
            'link' => route('events.index'),
            'type' => 'split_bg',
        ]);

        Banner::factory()->create([
            'title' => 'Потерялся питомец?',
            'subtitle' => 'Помогите найти пропавших животных',
            'image' => '/images/banner3.jpg',
            'link' => route('lost_reports.index'),
            'type' => 'lost',
        ]);

        Banner::factory()->create([
            'title' => 'Наши мероприятия',
            'subtitle' => 'Следите за новыми событиями приюта',
            'image' => '/images/banner4.jpg',
            'link' => route('events.index'),
            'type' => 'event',
        ]);
    }
}
