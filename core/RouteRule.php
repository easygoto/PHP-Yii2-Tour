<?php

namespace app\web;

/**
 * Class RouteRule
 *
 * @package app\web
 *
 * @method  static array get(string $pattern, string $route, array $defaults = [])
 * @method  static array post(string $pattern, string $route, array $defaults = [])
 * @method  static array put(string $pattern, string $route, array $defaults = [])
 * @method  static array patch(string $pattern, string $route, array $defaults = [])
 * @method  static array delete(string $pattern, string $route, array $defaults = [])
 */
class RouteRule
{
    public static function __callStatic($name, $arguments)
    {
        [$pattern, $route] = $arguments;
        $defaults = $arguments[2] ?? [];
        return self::rule(strtoupper($name), $pattern, $route, $defaults);
    }

    public static function rule($verb, $pattern, $route, $defaults)
    {
        return [
            'pattern'  => $pattern,
            'route'    => $route,
            'defaults' => $defaults,
            'verb'     => $verb,
        ];
    }

    /**
     * 增删改查的路由
     *
     * @param string $baseRoute
     * @param string $baseCtrl
     *
     * @return array
     */
    public static function baseApi(string $baseRoute, string $baseCtrl = '')
    {
        $baseCtrl = $baseCtrl ?: $baseRoute;
        return [
            RouteRule::get("{$baseRoute}/all/<limit:\d+?>", "{$baseCtrl}/all", ['limit' => 0]),
            RouteRule::get("{$baseRoute}/list/<page:\d+>", "{$baseCtrl}/index", ['page' => 1]),
            RouteRule::get("{$baseRoute}/<id:\d+>", "{$baseCtrl}/view"),
            RouteRule::post("{$baseRoute}", "{$baseCtrl}/create"),
            RouteRule::put("{$baseRoute}/<id:\d+>", "{$baseCtrl}/update"),
            RouteRule::patch("{$baseRoute}/<id:\d+>", "{$baseCtrl}/update"),
            RouteRule::delete("{$baseRoute}/<id:\d+>", "{$baseCtrl}/delete"),
        ];
    }

    /**
     * 页面的网址
     *
     * @param $options
     *
     * @return array
     */
    public static function basePage(array $options)
    {
        $wildcard = '[\w\-]+';
        $ver = 'v\d+';
        $act = $wildcard;
        $mod = $options['module'] ?? $wildcard;
        $cate = $options['category'] ?? $wildcard;
        $ctrl = $options['controller'] ?? $wildcard;

        if ($mod == $wildcard) {
            if ($cate == $wildcard) {
                if ($ctrl == $wildcard) {
                    return [];
                } else {
                    return [
                        "<controller:{$ctrl}>/<action:{$act}>" => "<controller>/<action>",
                        "<version:{$ver}>/<controller:{$ctrl}>/<action:{$act}>" => "<version>/<controller>/<action>",
                    ];
                }
            } else {
                return [
                    "<controller:{$ctrl}>/<action:{$act}>" => "<controller>/<action>",
                    "<version:{$ver}>/<controller:{$ctrl}>/<action:{$act}>" => "<version>/<controller>/<action>",
                    "<category:{$cate}>/<controller:{$ctrl}>/<action:{$act}>" =>
                        "<category>/<controller>/<action>",
                    "<version:{$ver}>/<category:{$cate}>/<controller:{$ctrl}>/<action:{$act}>" =>
                        "<version>/<category>/<controller>/<action>",
                ];
            }
        } else {
            if ($cate == $wildcard) {
                return [
                    "<module:{$mod}>" => "<module>",
                    "<module:{$mod}>/<controller:{$ctrl}>/<action:{$act}>" =>
                        "<module>/<controller>/<action>",
                    "<module:{$mod}>/<version:{$ver}>/<controller:{$ctrl}>/<action:{$act}>" =>
                        "<module>/<version>/<controller>/<action>",
                ];
            } else {
                return [
                    "<module:{$mod}>" => "<module>",
                    "<module:{$mod}>/<category:{$cate}>/<controller:{$ctrl}>/<action:{$act}>" =>
                        "<module>/<category>/<controller>/<action>",
                    "<module:{$mod}>/<version:{$ver}>/<category:{$cate}>/<controller:{$ctrl}>/<action:{$act}>" =>
                        "<module>/<version>/<category>/<controller>/<action>",
                ];
            }
        }
    }
}
