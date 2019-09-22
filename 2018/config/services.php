<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'twitter' => [
        // @see https://developer.twitter.com/en/docs/tweets/search/api-reference/get-search-tweets.html
        'search' => [
            'result_type' => 'mixed',
            'q' => env('TWITTER_SEARCH_QUERY'),
            'lang' => env('TWITTER_SEARCH_LANGUAGE', 'en'),
            'count' => env('TWITTER_SEARCH_RESULT_COUNT', 10),

            /**
             * If your search query is too specific, and you get no results, you may need
             * a fallback query that is less specific.
             */

            'fallback_query' => env('TWITTER_SEARCH_FALLBACK_QUERY', '#laravel OR @laravelphp -filter:retweets -filter:replies'),
        ],
    ],

    'meetup' => [
        'key' => env('MEETUP_KEY'),
        'urlName' => env('MEETUP_URL_NAME'),
    ],

    'community_inviter' => [
        'slack_team' => env('COMMUNITY_INVITER_SLACK_TEAM'),
        'slack_team_readable' => env('COMMUNITY_INVITER_SLACK_TEAM_READABLE'),
    ],

    'google_tag_manager' => [
        'id' => env('GOOGLE_TAG_MANAGER_ID'),
    ],

    'tinyletter' => [
        'username' => env('TINY_LETTER_USERNAME'),
    ],
];
