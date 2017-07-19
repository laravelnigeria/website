<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;
use \GuzzleHttp\Client;

class ContributeController extends Controller
{
    /**
     * Display the contribution page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __invoke()
    {
        /**
         * GET the contributors from Github API
         */
        try {
            $client = new Client();
            $response = $client->request('GET', env('GITHUB_CONTRIBUTORS_URL'));
            $responseData = json_decode($response->getBody());
            $result = array_slice($responseData, 0, 9);
        } catch (ClientException $exception) {
            return response()->view('errors.404', [], 404);
        }


        return view('contribute', compact('result'));
    }

}
