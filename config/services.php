<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'anilist' => [
    'api_url' => env('ANILIST_API_URL'),
    ],

    'animechan' => [
    'api_url' => env('ANIMECHAN_API_URL'),
    ],

    'jikan' => [
    'api_url' => env('JIKAN_API_URL'),
    ],

    'kitsu' => [
    'api_url' => env('KITSU_API_URL'),
    ],

    'reddit' => [
    'client_id' => env('REDDIT_CLIENT_ID'),
    'client_secret' => env('REDDIT_CLIENT_SECRET'),
    'username' => env('REDDIT_USERNAME'),
    'password' => env('REDDIT_PASSWORD'),
    'user_agent' => env('REDDIT_USER_AGENT'),
    ],

    'tracemoe' => [
    'api_url' => env('TRACEMOE_API_URL'),
    ],

    'waifu' => [
    'api_url' => env('WAIFU_API_URL'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

];
