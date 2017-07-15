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
                'name' => 'Scotch.io',
                'description' => 'Web development training',
                'responsible_for' => 'Financial Aid',
                'logo' => 'img/sponsor-scotch.png',
                'link' => 'https://scotch.io',
                'level' => 4,
            ],
            [
                'name' => 'Andela',
                'description' => null,
                'responsible_for' => 'Event center',
                'logo' => 'img/sponsor-andela.png',
                'link' => 'https://andela.com',
                'level' => 3,
            ],
            [
                'name' => 'Nexmo',
                'description' => 'APIs for SMS, Voice and Phone Verifications',
                'responsible_for' => 'Domain name',
                'logo' => 'img/sponsor-nexmo.png',
                'link' => 'https://nexmo.com',
                'level' => 2,
            ],
            [
                'name' => 'GigaLayer',
                'description' => 'Nigerian web hosting company',
                'responsible_for' => 'Domain name',
                'logo' => 'img/sponsor-gigalayer.png',
                'link' => 'https://gigalayer.com.ng',
                'level' => 1,
            ]
        ]);
    }
}
