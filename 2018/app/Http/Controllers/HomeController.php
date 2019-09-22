<?php

namespace App\Http\Controllers;

use App\Sponsor;
use Facades\App\Services\Twitter;
use App\Presenters\TweetPresenter;

class HomeController extends Controller
{
    /**
     * Home...A place where I can go, to take this off my shoulders.
     * Someone take me home.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $sponsors = Sponsor::orderedByLevel()->get();

        $tweets = Twitter::searchWithFallbackQuery()->get('tweets');

        $tweet = $tweets->isNotEmpty() ? new TweetPresenter($tweets->random()) : false;

        return view('index', compact('sponsors', 'tweet'));
    }
}
