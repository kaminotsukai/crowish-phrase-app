<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Phrase;
use Faker\Generator as Faker;

$factory->define(Phrase::class, function (Faker $faker) {
    return [
        'author_name' => $faker->name,
        'content' => $faker->sentence
    ];
});
