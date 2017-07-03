<?php

use Illuminate\Database\Seeder;

class SponsorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->insert([
            [
                'name' => 'CreativityKills',
                'description' => 'Nigerian web development company',
                'responsible_for' => 'Website',
                'logo' => 'img/sponsor-ck.png',
                'link' => 'https://creativitykills.co',
                'level' => 5,
            ],
            [
                'name' => 'Pusher',
                'description' => 'Build scalable realtime infrastructure',
                'responsible_for' => 'Swag & Video Coverage',
                'logo' => 'img/sponsor-pusher.png',
                'link' => 'https://pusher.com',
                'level' => 5,
            ],
            [
                'name' => 'Andela',
                'description' => null,
                'responsible_for' => 'Event center',
                'logo' => 'img/sponsor-andela.png',
                'link' => 'https://andela.com',
                'level' => 1,
            ],
            [
                'name' => 'GigaLayer',
                'description' => 'Nigerian web hostingcompany',
                'responsible_for' => 'Domain name',
                'logo' => 'img/sponsor-gigalayer.png',
                'link' => 'https://gigalayer.com.ng',
                'level' => 1,
            ]
        ]);
    }
}
