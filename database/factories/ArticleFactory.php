<?php

use Faker\Generator as Faker;

$factory->define(App\Article::class, function (Faker $faker) {

    return [
        'categoryId' => rand(1, 6),
        'title' => $faker->sentence(6),
        'content' => $faker->paragraph(3)
    ];
});
