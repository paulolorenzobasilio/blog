<?php

use Faker\Generator as Faker;

$factory->define(\App\Model\Blog::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'description' => $faker->sentence
    ];
});
