<?php

$config = [
    'id' => 'dawn',
    // 'layout' => 'main',
    'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'menuService' => [
            'class' => app\modules\dawn\components\services\Menu::class,
        ],
        'goodsService' => [
            'class' => app\modules\dawn\components\services\Goods::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];

return $config;
