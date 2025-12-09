<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'title' => 'Выставка приюта — Весна',
            'description' => 'Показ животных и знакомство с волонтёрами.',
            'starts_at' => Carbon::now()->addDays(10),
            'ends_at' => Carbon::now()->addDays(10)->addHours(4),
            'location' => 'Парк у речки',
            'capacity' => 200,
        ]);
    }
}
