<?php

namespace Database\Factories;

use App\Models\ShippingAddress;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingAddressFactory extends Factory
{
    protected $model = ShippingAddress::class;

    public function definition() {
        return [
            'order_id' => Order::all()->random()->id,
            'address' => $this->faker->address,
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'zip' => $this->faker->postcode,
        ];
    }
}
