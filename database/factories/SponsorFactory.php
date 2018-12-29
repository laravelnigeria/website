<?php

use Faker\Generator as Faker;

$factory->define(App\Sponsor::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->realText(90),
        'level' => rand(1, 10),
        'responsible_for' => $faker->realText(20),
        'link' => $faker->url,
        'logo' => $faker->imageUrl(100, 30),
    ];
});
