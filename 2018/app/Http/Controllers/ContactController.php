<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactSubmitted;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Submits the message sent via the contact form.
     *
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|string|between:5,100',
            'message' => 'required|string|between:100,2000',
        ]);

        $to = config('contact.to');

        // TODO: Make this an event instead. This is so we can hook other listeners.
        Mail::to($to['email'], $to['name'])->send(new ContactSubmitted(
            collect([
                'name' => $request->get('name'),
                'replyTo' => $request->get('email'),
                'message' => $request->get('message'),
                'email' => config('contact.from.email'),
            ])
        ));

        return response()->json(['success' => true]);
    }
}
