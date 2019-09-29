<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\TicketUser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests\WebhookRequest;
use App\Events\TicketRegistrationComplete;
use Illuminate\Auth\Access\AuthorizationException;

final class RegistrationWebhookController extends Controller
{
    public function __construct()
    {
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify');
    }

    /**
     * Handle the webhook data sent to our server from tito.
     *
     * @see  https://ti.to/docs/api/admin#webhooks-triggers
     *
     * @param  \App\Http\Requests\WebhookRequest $request
     * @return \Illuminate\Http\Response
     */
    public function handle(WebhookRequest $request): Response
    {
        $data = $request->validated();

        collect($data['tickets'])
            ->unique('email')
            ->mapInto(TicketUser::class)
            ->map(static function (TicketUser $ticketUser) use ($data) {
                $ticketUser->event_id = $data['event']['id'];
                $ticketUser->event_slug = $data['event']['slug'];
                return $ticketUser;
            })
            ->each(static function (TicketUser $ticketUser) {
                if ($ticketUser->save()) {
                    event(new TicketRegistrationComplete($ticketUser));
                }
            });

        return response()->noContent(200);
    }

    /**
     * Verify the opt-in!
     *
     * @param  Request $request
     */
    public function verify(Request $request)
    {
        /** @var TicketUser $ticketUser */
        if (!$ticketUser = TicketUser::query()->findOrFail($request->route('id'))) {
            throw new AuthorizationException;
        }

        if (!hash_equals((string) $request->route('hash'), sha1($ticketUser->getEmailForVerification()))) {
            throw new AuthorizationException;
        }

        $ticketUser->update(['opt_in_confirmed' => true]);

        return redirect(route('index'))->with('verified', true);
    }
}
