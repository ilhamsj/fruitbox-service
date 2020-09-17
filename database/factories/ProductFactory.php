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

$factory->define(App\Models\Product::class, function (Faker $faker) {
    $category = App\Models\Category::all();
    $brands = App\Models\Brand::all();

    $category_id = Arr::pluck($category, 'id');
    $brand_id = Arr::pluck($brands, 'id');

    return [
        'category_id' => $faker->randomElement($category_id),
        'brand_id' => $faker->randomElement($brand_id),
        'name' => $faker->word,
        'description' => $faker->text(150),
        'price' => rand(10000, 100000),
        'unit' => $faker->randomElement(['Kilogram', 'Piece', 'Gram', 'Bundle', 'Pax', 'Lusin']),
    ];
});
