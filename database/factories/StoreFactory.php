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

$factory->define(App\Models\Store::class, function (Faker $faker) {
    return [
        'merchant_id' => $faker->randomDigitNot(1),
        'village_id' => 3403010007,
        'name' => $faker->company,
        'address' => $faker->address,
    ];
});
