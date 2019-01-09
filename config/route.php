<?php

//    标准的 restful api
//    'PUT,PATCH users/<id>' => 'api/user/update',
//    'DELETE users/<id>' => 'api/user/delete',
//    'GET,HEAD users/<id>' => 'api/user/view',
//    'POST users' => 'api/user/create',
//    'GET,HEAD users' => 'api/user/index',
//    'users/<id>' => 'api/user/options',
//    'users' => 'api/user/options',

class RouteRule {
    
    public static function __callStatic($name, $arguments) {
        list($pattern, $route) = $arguments;
        $default = (isset($arguments[2]) && !empty($arguments[2])) ? $arguments[2] : [];
        return self::rule($pattern, $route, $default, strtoupper($name));
    }
    
    public static function rule($pattern, $route, $default, $verb){
        return [
            'pattern' => $pattern,
            'route' => $route,
            'defaults' => $default,
            'verb' => $verb,
        ];
    }
}

$__route = [
//    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', // 限制 url 中的字符，非 restful api
];

$__RestRoute = [
    // 用户控制器的路由
    RouteRule::get('api/users/<page:\d+>/<pageSize:\d+>', 'api/user/list', ['page' => 1, 'pageSize' => DEFAULT_PAGE_SIZE]),
    RouteRule::get('api/user/<id:\d+>', 'api/user/get'),
    RouteRule::put('api/user/<id:\d+>', 'api/user/update'),
    RouteRule::post('api/user', 'api/user/create'),
    RouteRule::patch('api/user/<id:\d+>', 'api/user/update'),
    RouteRule::delete('api/user/<id:\d+>', 'api/user/delete'),
];

return array_merge($__route, $__RestRoute);
