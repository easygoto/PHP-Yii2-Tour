<?php

require_once __DIR__ . '/constant.php';

$config = [
    'id'           => 'dawn',
    // 'layout' => 'main',
    'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'test' => [
            'class' => app\modules\dawn\components\Test::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
