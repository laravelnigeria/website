<?php

use Illuminate\Database\Seeder;

class MeetupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Meetup::class, 2)->create()->each(function ($meetup) {
            // factory('App\Talk', 2)->create(['meetup_id' => $meetup->id]);
        });
    }
}
