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
        $defaults = (isset($arguments[2]) && ! empty($arguments[2])) ? $arguments[2] : [];
        return self::rule($pattern, $route, $defaults, strtoupper($name));
    }
    
    public static function get($pattern, $route, $defaults = []) {
        return self::rule($pattern, $route, $defaults, 'GET');
    }
    
    public static function post($pattern, $route, $defaults = []) {
        return self::rule($pattern, $route, $defaults, 'POST');
    }
    
    public static function put($pattern, $route, $defaults = []) {
        return self::rule($pattern, $route, $defaults, 'PUT');
    }
    
    public static function patch($pattern, $route, $defaults = []) {
        return self::rule($pattern, $route, $defaults, 'PATCH');
    }
    
    public static function put_patch($pattern, $route, $defaults = []) {
        return self::rule($pattern, $route, $defaults, 'PUT,PATCH');
    }
    
    public static function delete($pattern, $route, $defaults = []) {
        return self::rule($pattern, $route, $defaults, 'DELETE');
    }
    
    public static function rule($pattern, $route, $defaults, $verb) {
        return [
            'pattern'  => $pattern,
            'route'    => $route,
            'defaults' => $defaults,
            'verb'     => $verb,
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
    RouteRule::post('api/user', 'api/user/create'),
    RouteRule::put_patch('api/user/<id:\d+>', 'api/user/update'),
    RouteRule::delete('api/user/<id:\d+>', 'api/user/delete'),
];

return array_merge($__route, $__RestRoute);
