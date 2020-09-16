<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

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
    $cost = rand(10000, 300000);
    $subtotal = rand(100000, 3000000);
    return [
        'user_id' => rand(1, 10),
        'store_id' => rand(1, 10),
        'status' => rand(1, 3),
        'payment_type' => 'COD',
        'user_phone' => $faker->phoneNumber,
        'user_address' => $faker->address,
        'store_phone' => $faker->phoneNumber,
        'delivery_cost' => $cost,
        'subtotal' => $subtotal,
        'total' => $cost+$subtotal,
        'delivered_at' => $faker->date('Y-m-d H:i:s'),
    ];
});
