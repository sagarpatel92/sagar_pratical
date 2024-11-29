<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\Payment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    
    {
        \App\Models\Customer::factory(1000)->create();
        \App\Models\Product::factory(200)->create();
        \App\Models\Order::factory(50000)->create();
        \App\Models\OrderItem::factory(200000)->create();
        \App\Models\BillingAddress::factory(5000)->create();
        \App\Models\ShippingAddress::factory(5000)->create();
        \App\Models\Payment::factory(50000)->create();
        \App\Models\User::factory(10)->create();
    }
}