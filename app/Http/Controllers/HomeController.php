<?php

namespace App\Http\Controllers;

use App\{Meetup, Sponsor, Talk};

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

        $group = $meetup->groupDetailsWithNextEvent();

        $next_event = $group->get('next_event');

        return view('index', compact('group', 'next_event', 'sponsors'));
    }

    /**
     * Returns a list of talks past and present.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function talks()
    {
        $talks = Talk::groupedByEvent();

        return view('talks', compact('talks'));
    }
}
