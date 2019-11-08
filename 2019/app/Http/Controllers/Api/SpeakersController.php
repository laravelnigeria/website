<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class SpeakersController extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json($this->fetchSpeakers());
    }

    private function fetchSpeakers(): array
    {
        return [
            [
                'id' => 3,
                'name' => 'Chisom Mbama',
                'job' => '',
                'title' => 'Getting started with Laravel',
                'image' => 'https://res.cloudinary.com/dlcjo3jva/image/upload/v1572258845/IMG_8412-2_hx4q8e.jpg',
                'social' => [
                    'twitter' => 'theCodeNurse_',
                    'github' => 'theCodeNurse',
                ],
                'abstract' => '
                This talk will run you through the amazing capabilities of the Laravel framework, the pre-requisites to using Laravel, get you started with the needed installations, and put your on track to start building your web apps with Laravel.

                If you\'re a newbie to Laravel, this session is for you.'
            ],
            [
                'id' => 1,
                'name' => 'Frantz Kati',
                'job' => '',
                'title' => 'Building, testing and scaling Laravel APIs effectively.',
                'image' => 'https://avatars0.githubusercontent.com/u/19477966?s=400&u=263d7c751c5e4ffb058bacb84604bed87485945e&v=4',
                'social' => [
                    'twitter' => 'bahdcoder',
                    'github' => 'bahdcoder',
                ],
                'abstract' => 'The building, testing, and scaling of APIs in Laravel is not as simple as it seems. Should you use Laravel or Lumen? How should you authenticate the API? How should you test, deploy and scale your API? CI or not? Performance testing?
                    This talk aims at answering all these questions. How and why to use Laravel and not Lumen, how to modify pieces of Laravel effectively for APIs,  how to improve API performance and scale with increased traffic. '
            ],
            [
                'id' => 2,
                'name' => 'Christian Jombo',
                'job' => ' Founder, Heptapixels LTD',
                'title' => 'Failure-As-A-Service: Dealing with failure and tough situations as a Developer.',
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/c_scale,w_713/v1573238094/christian-jumbo.jpg',
                'social' => [
                    'twitter' => 'christianjombo',
                    'github' => 'christianjombo',
                ],
                'abstract' => 'As developers, having that ability to build things out of nothing can make us feel infallible. This in turn means that we are never prepared for failure when we meet it. The goal of this talk to help fellow developers prepare for and deal with and face failure head-on without losing hope or giving up.'
            ],
            [
                'id' => 4,
                'name' => 'Michael Okoh',
                'job' => 'Developer, Hotels.ng',
                'title' => 'How to Deploy Laravel Applications securely on DigitalOcean',
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/w_1000,ar_16:9,c_fill,g_auto,e_sharpen/v1573239261/trojan.jpg',
                'social' => [
                    'github' => 'ichtrojan',
                    'twitter' => 'ichtrojan',
                ],
                'abstract' => 'This talk will Demonstrate how a developer can host their Laravel applications on a server.
                        At the end of this talk, attendees will have an idea of how to deploy Laravel applications on a DigitalOcean Ubuntu droplet.
                '
            ],
            // [
            //     'id' => 5,
            //     'name' => 'To Be Announced',
            //     'job' => 'To Be Announced',
            //     'title' => 'To Be Announced',
            //     'image' => '/img/no-photo.png',
            //     'social' => [
            //         'twitter' => 'laravelnigeria',
            //         'github' => 'laravelnigeria',
            //     ],
            //     'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
            //                    Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
            //                    et ad explicabo nisi officiis. Tempora eveniet blanditiis
            //                    fugiat a eius enim.'
            // ],
            // [
            //     'id' => 6,
            //     'name' => 'To Be Announced',
            //     'job' => 'To Be Announced',
            //     'title' => 'To Be Announced',
            //     'image' => '/img/no-photo.png',
            //     'social' => [
            //         'twitter' => 'laravelnigeria',
            //         'github' => 'laravelnigeria',
            //     ],
            //     'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
            //                    Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
            //                    et ad explicabo nisi officiis. Tempora eveniet blanditiis
            //                    fugiat a eius enim.'
            // ],
        ];
    }
}
