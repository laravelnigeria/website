<?php

use Faker\Generator as Faker;

$factory->define(App\UserProfile::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'gender' => rand(0, 1) ? 'Male' : 'Female',
        'bio' => $faker->realText(200),
        'stack' => json_encode(['php', 'laravel', 'vue']),
        'job' => "{$faker->jobTitle}, {$faker->company}",
        'social_links' => ['twitter' => '#', 'facebook' => '#'],
        'avatar' => 'https://randomuser.me/api/portraits/men/' . rand(50, 80) . '.jpg',
    ];
});
