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

$factory->define(App\Models\Stock::class, function (Faker $faker) {
    $products = App\Models\Product::all();
    $product_id = Arr::pluck($products, 'id');
    
    $stores = App\Models\Store::all();
    $store_id = Arr::pluck($stores, 'id');

    return [
        'product_id' => $faker->randomElement($product_id),
        'store_id' => $faker->randomElement($store_id),
        'quantity' => rand(25, 55),
    ];
});
