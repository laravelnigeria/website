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
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/v1573475473/trojan.jpg',
                'social' => [
                    'github' => 'ichtrojan',
                    'twitter' => 'ichtrojan',
                ],
                'abstract' => 'This talk will Demonstrate how a developer can host their Laravel applications on a server.
                        At the end of this talk, attendees will have an idea of how to deploy Laravel applications on a DigitalOcean Ubuntu droplet.
                '
            ],
            [
                'id' => 5,
                'name' => 'Sodeeq Elusoji',
                'job' => '',
                'title' => 'TDD: Building Maintainable Apps Through Tests',
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/c_fill,e_grayscale,g_face:center,h_673,w_673,x_1247/v1573475508/20190117_211301.jpg',
                'social' => [
                    'twitter' => 'sdktalks',
                    'github' => 'sdkcodes',
                ],
                'abstract' => "Writing Tests is something often considered unnecessary by developers because it's 'hard' and looks like too much work. However, building an app that stands the test of time needs to be properly tested, and more so, writing tests isn't that hard when properly understood. And the good thing is - Laravel makes testing so easy."
            ],
            [
                'id' => 6,
                'name' => 'Olatunbosun Egberinde',
                'job' => '',
                'title' => 'Asynchronous PHP and why you should care as a PHP Developer',
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/v1573681834/bosun.jpg',
                'social' => [
                    'twitter' => 'bosunski',
                    'github' => 'bosunski',
                ],
                'abstract' => 'In this talk, we will examine how traditional PHP Applications works and their limitations. We\'ll look into how Asynchronous PHP proffer solutions to some of these problems, then we\'ll have some benchmarks as proof of concepts for the things discussed.'
            ],
            [
                'id' => 7,
                'name' => 'Obaseki Etinosa',
                'job' => '',
                'title' => 'SOLID in Laravel: Too Much or Not Enough?',
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/v1573681646/IMG-20180517.jpg',
                'social' => [
                    'twitter' => '',
                    'github' => '',
                ],
                'abstract' => 'The SOLID principles generally espouse the practice of loose coupling when building software projects. 
                Your application should outlive any components or parts it\'s built from. 
                With frameworks, it can be difficult to adhere to these best practices especially with Laravel which offers so many helpful... well, helpers.
                This talk explores how the SOLID principles can be used even while enjoying the benefits that Laravel provides.'
            ],
            [
                'id' => 8,
                'name' => 'Omoike Sarah',
                'job' => '',
                'title' => 'Web Accessibility: Building With Inclusion.',
                'image' => 'https://res.cloudinary.com/ddbm6rq61/image/upload/v1573738846/sarah.jpg',
                'social' => [
                    "twitter" => "awesome_Sayrah"
                ],
                'abstract' => 'Improving your product’s accessibility can enhance the usability for all users, including those with low vision, blindness, hearing impairments, cognitive impairments, motor impairments or situational disabilities (such as a broken arm). When sites are correctly designed and developed, generally all users have equal access to information and functionality. Accessibility is often forgotten by developers, even in 2019; as a result, people with disabilities get left behind. Fortunately, some techniques can help kick start the process. In this talk, you’ll learn hands-on skills for developing inclusively and how developers can hard-code accessibility into their workflow.
                    How do we build accessible web applications?
                    The answer is to ensure that people with disabilities can enjoy the full use of our web applications; they can access content, navigate our web applications successfully, engage with different elements, etc.'
            ],
        ];
    }
}
