<?php

use app\modules\dawn\core\services;

$config = [
    'id' => 'dawn',
    // 'layout' => 'main',
    // 'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'userService' => [
            'class' => services\UserService::class
        ],
        'menuService' => [
            'class' => services\MenuService::class,
        ],
        'goodsService' => [
            'class' => services\GoodsService::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
