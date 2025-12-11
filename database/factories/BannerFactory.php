<?php

namespace Database\Factories;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerFactory extends Factory
{
    protected $model = Banner::class;

    public function definition()
    {
        $types = ['full_bg', 'split_bg', 'lost', 'event'];
        return [
            'title' => $this->faker->sentence(4),
            'subtitle' => $this->faker->sentence(8),
            'image' => null, // можно добавить $this->faker->imageUrl(800,300)
            'link' => '#',
            'type' => $this->faker->randomElement($types),
        ];
    }
}
