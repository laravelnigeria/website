<?php

use Illuminate\Database\Seeder;

class TalksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Talk::class, 5)->create();
    }
}
