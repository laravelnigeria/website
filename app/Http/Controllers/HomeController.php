<?php

namespace App\Http\Controllers;

use App\{Sponsor, Twitter};

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $seo_title = 'The best Laravel PHP developers in Nigeria';

        $sponsors = Sponsor::theLot();

        $tweet = Twitter::search()->get('statuses')->random();

        return view('index', compact('sponsors', 'tweet', 'seo_title'));
    }

    /**
     * Display the home page.
     */
    public function home()
    {
        return redirect()->route('index');
    }
}
