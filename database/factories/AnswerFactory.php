<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'user_id' => factory(\App\User::class)->create()->id,
        'question_id' => factory(\App\Question::class)->create()->id,
        'body' => $faker->paragraph,
    ];
});
