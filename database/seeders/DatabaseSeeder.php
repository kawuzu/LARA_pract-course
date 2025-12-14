<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        $this->call(ItemSeeder::class);
        $this->call(RolesAndAdminSeeder::class);
        $this->call(AnimalSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(AdviceSeeder::class);
        $this->call(StorySeeder::class);
        $this->call(BannerSeeder::class);
    }
}
