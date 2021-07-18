<?php

return [
    'webhook_url' => env('TITO_WEBHOOK_URL', 'webhook'),

    // Usually a "Yes" or "No" question attached to the ticket...
    'ticket_confirmation_slug' => env('TITO_TICKET_CONFIRMATION_SLUG'),

    'verification' => [
        'expire' => env('TITO_SPONSOR_CONTACT_VERIFICATION_EMAIL_LINK_EXPIRE', 1440),
    ],

    'allowed_webhooks' => [
        // "checkin.created",
        // "ticket.created",
        // "ticket.completed",
        // "ticket.reassigned",
        // "ticket.updated",
        // "ticket.unsnoozed",
        // "ticket.unvoided",
        // "ticket.voided",
        // "registration.started",
        // "registration.filling",
        // "registration.updated",
        // "registration.finished",
        "registration.completed",
        // "registration.cancelled",
    ],

];
