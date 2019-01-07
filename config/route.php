<?php

return [
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    [
        'pattern' => 'api/user/list/<page:\d+>',
        'route' => 'api/user/list',
        'defaults' => ['page' => 1],
    ],[
        'pattern' => 'api/user/get/<id:\d+>',
        'route' => 'api/user/get',
        'defaults' => ['id' => 0],
    ],
//    'posts' => 'site/about', // 指定别名的规则
];
