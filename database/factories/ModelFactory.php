<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'job' => $faker->jobTitle.', '.$faker->company,
        'password' => $password ?: $password = bcrypt('secret'),
        'social_links' => '{"twitter":"#","facebook":"#"}',
        'avatar' => 'https://randomuser.me/api/portraits/men/'.rand(50,80).'.jpg',
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Meetup::class, function (Faker\Generator $faker) {
    static $event_id;

    if ($event_id) {
        $event_id = rand(100000000, 999999999);
    }

    return [
        'event_id' => $event_id ?: $event_id = 240522436,
        'link' => "https://www.meetup.com/Laravel-Nigeria/events/{$event_id}/",
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Talk::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'topic' => $faker->sentence,
        'overview' => $faker->paragraphs(3, true),
        'accepted' => (bool) rand(0, 1),
    ];
});