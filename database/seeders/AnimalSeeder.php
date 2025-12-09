<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        // создаём несколько тестовых животных
        Animal::factory()->count(8)->create();

        // или можно вставить конкретные:
        Animal::create([
            'name' => 'Мурка',
            'species' => 'cat',
            'breed' => 'домашняя',
            'age' => 3,
            'sex' => 'female',
            'description' => 'Добрая кошка, подходит в квартиру.',
            'photo' => null,
            'status' => 'available',
        ]);
    }
}
