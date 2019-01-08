<?php

return [
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', // 限制 url 中的字符
    
    // 用户控制器的路由
    [
        'pattern' => 'api/users/<page:\d+>/<pageSize:\d+>',
        'route' => 'api/user/list',
        'defaults' => ['page' => 1, 'pageSize' => DEFAULT_PAGE_SIZE],
    ],
    'api/user/<id:\d+>' => 'api/user/get',
    'POST,PUT api/user' => 'api/user/update',
    'DELETE api/user/<id:\d+>' => 'api/user/delete',
];
