<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advice;

class AdviceSeeder extends Seeder
{
    public function run()
    {
        Advice::create([
            'title' => 'Что делать, если пропал питомец',
            'content' => 'Сразу осмотрите район, оповестите соседей, разместите объявления и фото в соцсетях.',
        ]);
    }
}
