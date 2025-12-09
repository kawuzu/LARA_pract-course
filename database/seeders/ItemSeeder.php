<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    public function run()
    {
        $items = [
            ['title'=>'Карточка 1','description'=>'Краткое описание 1'],
            ['title'=>'Карточка 2','description'=>'Краткое описание 2'],
            ['title'=>'Карточка 3','description'=>'Краткое описание 3'],
            ['title'=>'Карточка 4','description'=>'Краткое описание 4'],
            ['title'=>'Карточка 5','description'=>'Краткое описание 5'],
            ['title'=>'Карточка 6','description'=>'Краткое описание 6'],
        ];
        foreach ($items as $i) {
            Item::create($i);
        }
    }
}
