<?php

//    标准的 restful api
//    'PUT,PATCH users/<id>' => 'api/user/update',
//    'DELETE users/<id>' => 'api/user/delete',
//    'GET,HEAD users/<id>' => 'api/user/view',
//    'POST users' => 'api/user/create',
//    'GET,HEAD users' => 'api/user/index',
//    'users/<id>' => 'api/user/options',
//    'users' => 'api/user/options',
if (RESTFUL_API_ENABLE) {

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

    return [
        RouteRule::get('api/test', 'base/api/test'),
        // 用户控制器的路由
        RouteRule::get('api/v1/users/<page:\d+>', 'api/v1/user/list', ['page' => DEFAULT_PAGE]),
        RouteRule::get('api/v1/user/<id:\d+>', 'api/v1/user/get'),
        RouteRule::post('api/v1/user', 'api/v1/user/create'),
        RouteRule::put_patch('api/v1/user/<id:\d+>', 'api/v1/user/update'),
        RouteRule::delete('api/v1/user/<id:\d+>', 'api/v1/user/delete'),

        // 商品控制器
        RouteRule::get('api/v1/products/<page:\d+>', 'api/v1/goods/list', ['page' => DEFAULT_PAGE]),
        RouteRule::get('api/v1/products', 'api/v1/goods/list'),
        RouteRule::get('api/v1/product/<id:\d+>', 'api/v1/goods/get'),
        RouteRule::post('api/v1/product', 'api/v1/goods/create'),
    ];
} else {

    return [
        '<version:\w+>/<moudle:\w+>/<controller:\w+>/<action:\w+>'=>'<version>/<moudle>/<controller>/<action>',
        '<moudle:\w+>/<controller:\w+>/<action:\w+>'=>'<moudle>/<controller>/<action>',
        '<controller:\w+>/<action:\w+>'=>'<controller>/<action>', // 限制 url 中的字符，非 restful api
    ];
}
