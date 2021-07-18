<?php

namespace App\Http\Controllers;

use Facades\App\Talk;

class TalksController extends Controller
{
    public function __invoke()
    {
        $meetups = Talk::organisedByMeetup();
        // dd($meetups->first()->get('details'));

        return view('talks', compact('meetups'));
    }
}
