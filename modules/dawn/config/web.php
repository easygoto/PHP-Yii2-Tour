<?php

$config = [
    'id' => 'dawn',
    // 'layout' => 'main',
    'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'test' => [
            'class' => app\modules\dawn\components\Test::class,
        ],
        'menuService' => [
            'class' => app\modules\dawn\components\services\MenuService::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
