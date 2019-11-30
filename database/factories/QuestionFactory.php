<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
    ];
});
