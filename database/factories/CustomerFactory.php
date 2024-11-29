<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customer;
use Faker\Generator as Faker;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    
        public function definition()
        {

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone_number' => $this->faker->phoneNumber,
            'created_at' => now(),
            'updated_at' => now(),
        ]; 
    }
}