<?php

return [
    'dependencies' => [
        'factories' => [
            \Gems\Rest\Legacy\CurrentUserRepository::class => \Gems\Rest\Factory\ReflectionFactory::class,
        ]
    ]
];