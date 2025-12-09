<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Story;
use App\Models\User;

class StorySeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        Story::create([
            'title' => 'Новый дом для Барсика',
            'body' => 'Мы нашли Барсика в парке — и он стал частью семьи. Очень благодарны приюту.',
            'user_id' => $user ? $user->id : null,
        ]);
    }
}
