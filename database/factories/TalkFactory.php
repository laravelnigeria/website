<?php

use Faker\Generator as Faker;

$factory->define(App\Talk::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first()->id,
        'meetup_id' => App\Meetup::inRandomOrder()->first()->id,
        'topic' => $faker->sentence,
        'overview' => $faker->paragraphs(3, true),
        'accepted' => (bool) rand(0, 1),
        'video_url' => $faker->url,
        'slides_url' => $faker->url,
    ];
});
