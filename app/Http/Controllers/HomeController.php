<?php

namespace App\Http\Controllers;

use App\{Meetup, Sponsor, Talk, Twitter};

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        // $this->middleware('auth')->except('index');
    }

    /**
     * Show the applications homepage.
     *
     * @param Meetup $meetup
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Meetup $meetup)
    {
        $sponsors = Sponsor::theLot();

        $tweet = Twitter::search()->get('statuses')->random();

        $group = $meetup->groupDetailsWithNextEvent();

        $next_event = $group->get('next_event');

        return view('index', compact('group', 'next_event', 'sponsors', 'tweet'));
    }

    /**
     * Display the home page.
     */
    public function home()
    {
        return redirect()->route('index');
    }
}
