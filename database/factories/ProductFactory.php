<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    public function definition() {
        return [
             'name' => $this->faker->words(3, true), // Random name with 3 words
            'price' => $this->faker->randomFloat(2, 5, 500), // Price between 5 and 500 with 2 decimal places
            'description' => $this->faker->sentence(10), // Random 10-word description
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
