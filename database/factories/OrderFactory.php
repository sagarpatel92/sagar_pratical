<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;


class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition()
{
        return [
            'customer_id' => Customer::all()->random()->id, // Random customer ID
            'total_amount' => $this->faker->randomFloat(2, 20, 500),
            'status' => $this->faker->randomElement(['pending', 'processed', 'shipped', 'delivered']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}