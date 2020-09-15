<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscribers;
use Faker\Generator as Faker;

$factory->define(Subscribers::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'confirmed' => 1,
        'created_at' => $faker->dateTime,
    ];
});
