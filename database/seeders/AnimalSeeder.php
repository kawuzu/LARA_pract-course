<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Animal;

class AnimalSeeder extends Seeder
{
    public function run()
    {
        Animal::factory()->count(8)->create();

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
