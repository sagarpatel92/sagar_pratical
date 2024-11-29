<?php

namespace Database\Factories;

use App\Models\BillingAddress;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillingAddressFactory extends Factory
{

    protected $model = BillingAddress::class;

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
