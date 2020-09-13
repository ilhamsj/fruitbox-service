<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\UserAddress;

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

$factory->define(UserAddress::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 5),
        'village_id' => rand(3403010006, 3403010011),
        'name' => $faker->word,
        'address' => $faker->address,
    ];
});
