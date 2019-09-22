<?php

return [
    'to' => [
        'name' => env('CONTACT_MSG_SEND_TO_NAME', 'Neo Ighodaro'),
        'email' => env('CONTACT_MSG_SEND_TO_EMAIL', 'neo@creativitykills.co'),
    ],

    'from' => [
        'email' => env('CONTACT_MSG_SEND_FROM_EMAIL', 'neo@creativitykills.co'),
    ],
];
