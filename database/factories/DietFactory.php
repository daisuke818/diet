<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'weight' => $faker->randomDigit,
        'target_weight' => $faker->randomDigit,
        'content' => $faker->realText,
    ];
});
