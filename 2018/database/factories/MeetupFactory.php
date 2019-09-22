<?php

use Faker\Generator as Faker;

$factory->define(App\Meetup::class, function (Faker $faker) {
    static $event_id;

    if ($event_id) {
        // Quite specific to Laravel Nigeria's meetup page and its events...
        $event_id = $event_id === 238642730 ? 240522436 : rand(100000000, 999999999);
    }

    $meetup_name = config('services.meetup.urlName');

    return [
        'event_id' => $event_id ?: $event_id = 238642730,
        'link' => "https://www.meetup.com/{$meetup_name}/events/{$event_id}/",
    ];
});
