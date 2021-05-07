<?php

return [
    'testSms' => [ // Client identifier
        'class' => \Gems\Communication\Http\SpryngSmsClient::class, // Class of the communicator client
        'uri' => 'https://webhook.site/71980334-d90c-4340-ab93-d8f0bd80bd98', // URI of the API. webhooks.site is a good site for test requests
        'api_key' => 'xyz', 
        'default_originator' => 'FromName', // Default fallback 'from' address for sms. max 11 characters
    ],
];
