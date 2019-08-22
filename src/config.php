<?php

return [
    /**
     * Server to report errors to.
     */
    'endpoint' => 'https://playground.emilmoe.com/api/error/report',

    /**
     * Client ID.
     */
    'client_id' => env('ERROR_REPORTER_CLIENT_ID'),

    /**
     * Client Secret.
     */
    'client_secret' => env('ERROR_REPORTER_SECRET'),
];
