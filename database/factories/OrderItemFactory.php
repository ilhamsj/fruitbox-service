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

$factory->define(App\Models\OrderItem::class, function (Faker $faker) {
    $price = rand(10000, 300000);
    $quantity = rand(1, 4);
    return [
        'order_id' => rand(1, 5),
        'product_id' => rand(1, 5),
        'name' => $faker->word,
        'unit' => $faker->randomElement(['Kilogram', 'Piece', 'Gram', 'Bundle', 'Pax', 'Lusin']),
        'quantity' => $quantity,
        'price' => $price,
        'price_total' => $price * $quantity,
    ];
});
