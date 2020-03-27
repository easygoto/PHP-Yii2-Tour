<?php

use app\modules\dawn\core\services;

return [
    'id' => 'dawn',
    // 'layout' => 'main',
    // 'defaultRoute' => 'test/index',

    'components' => [
        // list of component configurations
        'goodsService' => [
            'class' => services\GoodsService::class,
        ],
    ],

    'params' => [
        // list of parameters
    ],
];
