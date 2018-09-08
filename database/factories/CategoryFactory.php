<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'parentId'=>0,
        'name' => substr($faker->sentence(2), 0, -1),
        'description' => $faker->sentence(25)
    ];
});
