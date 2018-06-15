<?php

return [
    'gateways' => [
        'twilio' => [
            'sid'        => env('TWILIO_SID'),
            'auth_token' => env('TWILIO_AUTH'),
        ],
    ],
];
