<?php

declare(strict_types=1);

namespace App\Events;

use App\TicketUser;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

final class TicketRegistrationComplete
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /** @var TicketUser $ticketUser */
    public $ticketUser;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TicketUser $ticketUser)
    {
        $this->ticketUser = $ticketUser;
    }
}
