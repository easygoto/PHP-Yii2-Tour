<?php

use app\modules\dawn\core\services;

$config = [
    'id' => 'dawn',
    // 'layout' => 'main',
    // 'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'userService' => [
            'class' => services\User::class
        ],
        'menuService' => [
            'class' => services\Menu::class,
        ],
        'goodsService' => [
            'class' => services\Goods::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
