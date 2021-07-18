<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\TicketRegistrationComplete;
use Illuminate\Contracts\Queue\ShouldQueue;

final class SendSponsorContactOptInNotification implements ShouldQueue
{
    public function handle(TicketRegistrationComplete $event): void
    {
        $event->ticketUser->sendOptInConfirmationNotification();
    }
}
