<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition()
    {
        $species = $this->faker->randomElement(['dog','cat','other']);
        return [
            'name' => $this->faker->firstName,
            'species' => $species,
            'breed' => $this->faker->word,
            'age' => $this->faker->numberBetween(1,12),
            'sex' => $this->faker->randomElement(['male','female']),
            'description' => $this->faker->paragraph,
            'photo' => null,
            'status' => 'available',
            'location' => $this->faker->city,
        ];
    }
}
