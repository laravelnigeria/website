<?php

declare(strict_types=1);

namespace App\Http\Controllers;

final class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home', [
            'sponsors' => $this->sponsors(),
            'page' => ['title' => "Nigeria's biggest PHP conference"]
        ]);
    }

    private function sponsors(): array
    {
        return [
            [
                'image' => 'img/sponsor-ay.png',
                'link' => 'https://aboutyou.de',
                'title' => 'Laravel Nigeria Sponsor - ABOUT YOU GmbH',
            ],
            [
                'image' => 'img/sponsor-pusher.png',
                'link' => 'https://pusher.com',
                'title' => 'Laravel Nigeria Sponsor - Pusher',
            ],
            [
                'image' => 'img/sponsor-laravel.png',
                'link' => 'https://laravel.com',
                'title' => 'Laravel Nigeria Sponsor - Laravel',
            ],
            [
                'image' => 'img/sponsor-ck-icon.png',
                'link' => 'https://creativitykills.co',
                'title' => 'Laravel Nigeria Sponsor - CreativityKills',
            ],
        ];
    }
}
