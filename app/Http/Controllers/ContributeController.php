<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContributeController extends Controller
{
    /**
     * Display the contribution page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        return view('contribute');
    }
}
