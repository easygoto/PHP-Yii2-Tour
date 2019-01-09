<?php

//    标准的 restful api
//    'PUT,PATCH users/<id>' => 'api/user/update',
//    'DELETE users/<id>' => 'api/user/delete',
//    'GET,HEAD users/<id>' => 'api/user/view',
//    'POST users' => 'api/user/create',
//    'GET,HEAD users' => 'api/user/index',
//    'users/<id>' => 'api/user/options',
//    'users' => 'api/user/options',

return [
    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', // 限制 url 中的字符，非 restful api
    
    // 用户控制器的路由
    [
        'pattern' => 'api/users/<page:\d+>/<pageSize:\d+>',
        'route' => 'api/user/list',
        'defaults' => ['page' => 1, 'pageSize' => DEFAULT_PAGE_SIZE],
        'verb' => 'GET',
//        'verb' => ['GET','POST'], // 其他语言的获取列表的请求方法可能是 POST
    ],
    'DELETE api/user/<id:\d+>' => 'api/user/delete',
    'POST,PUT api/user' => 'api/user/update',
    'api/user/<id:\d+>' => 'api/user/get',
];
