<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use App\Phrase;
use Faker\Generator as Faker;

$factory->define(Phrase::class, function (Faker $faker) {
    return [
        'id' => Str::uuid(),
        'author_id' => function() {
            return factory(Author::class)->create()->id;
        },
        'content' => $faker->sentence
    ];
});
