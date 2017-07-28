<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest as Request;

class ContactController extends Controller {

    /**
     * Handle the submitted contact form queue the email and send the json
     * encoded response back to the requester.
     *
     * @param  Request $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $fakeToken = $request->get('__token');

        /**
         * If, and only if, the fake token matches the token set by JavaScript should the email be actually sent.
         * If it does not match then return a positive response also. Since bots cannot load javascript then
         * they would not be able to execute the part of the javascript that will replace the token with
         * the real token. This also means anyone with Javascript disabled cannot contact you.
         *
         * Well on your own oo, on your own o, on your own o...
         */

        if ($fakeToken AND $fakeToken === "YUesU09isIUiUkCX9288==") {
            // Queue the email to be sent by a job or whatever later sha...
            $details = collect($request->only(['name', 'email', 'message']));

            Mail::to("neo@creativitykills.co", config('app.name'))->send(new ContactMessage($details));
        }

        return ['message' => 'Email sent successfully!', 'status' => 'ok'];
    }
}
