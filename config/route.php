<?php

//    标准的 restful api
//    'PUT,PATCH users/<id>' => 'api/user/update',
//    'DELETE users/<id>' => 'api/user/delete',
//    'GET,HEAD users/<id>' => 'api/user/view',
//    'POST users' => 'api/user/create',
//    'GET,HEAD users' => 'api/user/index',
//    'users/<id>' => 'api/user/options',
//    'users' => 'api/user/options',

use Trink\Core\Helper\RouteRule;

if (RESTFUL_API_ENABLE) {
    return [
        RouteRule::get('api/test', 'base/api/test'),
        // 用户控制器的路由
        RouteRule::get('api/v1/users/<page:\d+>', 'api/v1/user/list', ['page' => DEFAULT_PAGE]),
        RouteRule::get('api/v1/user/<id:\d+>', 'api/v1/user/get'),
        RouteRule::post('api/v1/user', 'api/v1/user/create'),
        RouteRule::putPatch('api/v1/user/<id:\d+>', 'api/v1/user/update'),
        RouteRule::delete('api/v1/user/<id:\d+>', 'api/v1/user/delete'),

        // 商品控制器
        RouteRule::get('api/v1/products/<page:\d+>', 'api/v1/goods/list', ['page' => DEFAULT_PAGE]),
        RouteRule::get('api/v1/products', 'api/v1/goods/list'),
        RouteRule::get('api/v1/product/<id:\d+>', 'api/v1/goods/get'),
        RouteRule::post('api/v1/product', 'api/v1/goods/create'),
    ];
} else {
    return [
        '<controller:\w+>/<action:\w+>'                            => '<controller>/<action>',
        '<module:\w+>/<controller:\w+>/<action:\w+>'               => '<module>/<controller>/<action>',
        '<version:\w+>/<module:\w+>/<controller:\w+>/<action:\w+>' => '<version>/<module>/<controller>/<action>',
    ];
}
