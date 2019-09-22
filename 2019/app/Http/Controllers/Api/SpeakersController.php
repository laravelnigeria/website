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
                'id' => 1,
                'name' => 'To Be Announced',
                'job' => 'To Be Announced',
                'title' => 'To Be Announced',
                'image' => '/img/no-photo.png',
                'social' => [
                    'twitter' => 'laravelnigeria',
                    'github' => 'laravelnigeria',
                ],
                'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                               Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
                               et ad explicabo nisi officiis. Tempora eveniet blanditiis
                               fugiat a eius enim.'
            ],
            [
                'id' => 2,
                'name' => 'To Be Announced',
                'job' => 'To Be Announced',
                'title' => 'To Be Announced',
                'image' => '/img/no-photo.png',
                'social' => [
                    'twitter' => 'laravelnigeria',
                ],
                'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                               Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
                               et ad explicabo nisi officiis. Tempora eveniet blanditiis
                               fugiat a eius enim.'
            ],
            [
                'id' => 3,
                'name' => 'To Be Announced',
                'job' => 'To Be Announced',
                'title' => 'To Be Announced',
                'image' => '/img/no-photo.png',
                'social' => [
                    'twitter' => 'laravelnigeria',
                    'github' => 'laravelnigeria',
                ],
                'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                               Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
                               et ad explicabo nisi officiis. Tempora eveniet blanditiis
                               fugiat a eius enim.'
            ],
            [
                'id' => 4,
                'name' => 'To Be Announced',
                'job' => 'To Be Announced',
                'title' => 'To Be Announced',
                'image' => '/img/no-photo.png',
                'social' => [
                    'github' => 'laravelnigeria',
                ],
                'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                               Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
                               et ad explicabo nisi officiis. Tempora eveniet blanditiis
                               fugiat a eius enim.'
            ],
            [
                'id' => 5,
                'name' => 'To Be Announced',
                'job' => 'To Be Announced',
                'title' => 'To Be Announced',
                'image' => '/img/no-photo.png',
                'social' => [
                    'twitter' => 'laravelnigeria',
                    'github' => 'laravelnigeria',
                ],
                'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                               Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
                               et ad explicabo nisi officiis. Tempora eveniet blanditiis
                               fugiat a eius enim.'
            ],
            [
                'id' => 6,
                'name' => 'To Be Announced',
                'job' => 'To Be Announced',
                'title' => 'To Be Announced',
                'image' => '/img/no-photo.png',
                'social' => [
                    'twitter' => 'laravelnigeria',
                    'github' => 'laravelnigeria',
                ],
                'abstract' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.
                               Esse explicabo earum quos autem ipsa in! Eaque sunt fuga
                               et ad explicabo nisi officiis. Tempora eveniet blanditiis
                               fugiat a eius enim.'
            ],
        ];
    }
}
