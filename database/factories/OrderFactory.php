<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Arr;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Order::class, function (Faker $faker) {
    $users = App\User::all();
    $user_id = Arr::pluck($users, 'id');
    
    $stores = App\Models\Store::all();
    $store_id = Arr::pluck($stores, 'id');
    
    $order_statuses = App\Models\OrderStatus::all();
    $order_status_id = Arr::pluck($order_statuses, 'id');

    $cost = rand(10000, 300000);
    $subtotal = rand(100000, 3000000);

    return [
        'user_id' => $faker->randomElement($user_id),
        'store_id' => $faker->randomElement($store_id),
        'order_status_id' => $faker->randomElement($order_status_id),
        'payment_type' => 'COD',
        'user_phone' => $faker->phoneNumber,
        'user_address' => $faker->address,
        'store_phone' => $faker->phoneNumber,
        'delivery_cost' => $cost,
        'subtotal' => $subtotal,
        'total' => $cost + $subtotal,
    ];
});
