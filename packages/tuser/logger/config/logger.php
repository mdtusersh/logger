<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Logger Medium
    |--------------------------------------------------------------------------
    |
    | This option defines the default log medium that is utilized to write
    | messages to your logs. The value provided here should match one of
    | the channels present in the list of "mediums" configured below.
    |
    */

    'default' => env('LOGGER_MEDIUM', 'stack'),

    /*
    |--------------------------------------------------------------------------
    | Logger Mediums
    |--------------------------------------------------------------------------
    |
    | Here you may configure the logger mediums for your application.
    |
    | Available mediums: "text", "json", "stream", "database", "stack"
    |
    */

    'mediums' => [
        'text' => [
            'path' => storage_path('logs/logger.txt'),
        ],

        'json' => [
            'path' => storage_path('logs/logger.json'),
        ],

        'stream' => [
            'stream' => fopen('php://output', 'w'),
        ],

        'stack' => [
            'mediums' => explode(',', env('LOGGER_STACK', 'text,json,stream,database')),
        ],
    ],
];
