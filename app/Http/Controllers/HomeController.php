<?php

namespace App\Http\Controllers;

use App\Meetup;
use Illuminate\Http\Request;
use Illuminate\Contracts\Cache\Factory as Cache;

class HomeController extends Controller
{
    /**
     * @var Cache
     */
    private $cache;

    /**
     * Create a new controller instance.
     *
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;

        $this->middleware('auth')->except('index');
    }

    /**
     * Show the applications homepage.
     *
     * @param Meetup $meetup
     * @return \Illuminate\Http\Response
     */
    public function index(Meetup $meetup)
    {
        $group = $meetup->groupDetailsWithNextEvent();

        $next_event = $group->get('next_event');

        return view('index', compact('group', 'next_event', 'sponsors'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('home');
    }
}
