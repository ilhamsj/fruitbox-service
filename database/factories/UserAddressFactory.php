<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\UserAddress;
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

$factory->define(UserAddress::class, function (Faker $faker) {
    $users = App\User::all();
    $user_id = Arr::pluck($users, 'id');
    
    $villages = App\Models\Village::all();
    $village_id = Arr::pluck($villages, 'id');

    return [
        'user_id' => $faker->randomElement($user_id),
        'village_id' => $faker->randomElement($village_id),
        'name' => $faker->word,
        'address' => $faker->address,
    ];
});