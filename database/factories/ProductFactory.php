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

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => rand(1, 5),
        'brand_id' => rand(1, 5),
        'name' => $faker->domainWord,
        'description' => $faker->text(200),
        'price' => rand(1, 10),
        'unit' => rand(1, 10),
    ];
});
