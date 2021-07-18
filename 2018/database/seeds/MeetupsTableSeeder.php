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
        factory(App\Meetup::class, 2)->create();
    }
}
