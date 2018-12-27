<?php

return [
    'middleware_pipeline' => [
        'always' => [
            'middleware' => [Blast\BaseUrl\BaseUrlMiddleware::class],
            'priority' => 10000
        ],
    ],
];