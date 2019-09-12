<?php

return [
    /*
    **
    * Server To Report Errors To
    */
    'endpoint' => env('ERROR_REPORTER_ENDPOINT', 'https://playground.emilmoe.com/api/error/report'),

    /*
    **
    * Environments
    */
    'environments' => ['production'],

    /*
    **
    * Client ID
    */
    'client_id' => env('ERROR_REPORTER_CLIENT_ID'),

    /*
    **
    * Client Secret
    */
    'client_secret' => env('ERROR_REPORTER_SECRET'),

    /**
     * Logs you don't want to report back to us.
     */
    'ignored_logs' => [
        // 'alert',
        // 'critical',
        // 'debug',
        // 'emergency',
        // 'error',
        // 'info',
        // 'notice',
        // 'warning',
    ],
];
