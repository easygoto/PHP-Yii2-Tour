<?php

use app\modules\dawn\components\TestComponent;

require_once __DIR__ . '/constant.php';

$config = [
    'id'           => 'dawn',
    // 'layout' => 'main',
    'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'test' => [
            'class' => TestComponent::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
