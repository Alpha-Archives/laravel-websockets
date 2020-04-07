<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'user_id' => $name = $faker->numberBetween(1,5),
        'message' => $name = $faker->sentence,
    ];
});
