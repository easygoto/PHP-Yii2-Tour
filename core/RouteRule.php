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
        list($pattern, $route) = $arguments;
        $defaults = $arguments[2] ?? [];
        return self::rule(strtoupper($name), $pattern, $route, $defaults);
    }

    public static function rule($verb, $pattern, $route, $defaults)
    {
        return [
            'pattern' => $pattern,
            'route' => $route,
            'defaults' => $defaults,
            'verb' => $verb,
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
    public static function base(string $baseRoute, string $baseCtrl = '')
    {
        $baseCtrl = $baseCtrl ?: $baseRoute;
        return [
            RouteRule::post(
                "{$baseRoute}",
                "{$baseCtrl}/create"
            ),
            RouteRule::get(
                "{$baseRoute}/list/<page:\d+>",
                "{$baseCtrl}/index",
                ['page' => 1]
            ),
            RouteRule::get(
                "{$baseRoute}/<id:\d+>",
                "{$baseCtrl}/view"
            ),
            RouteRule::patch(
                "{$baseRoute}/<id:\d+>",
                "{$baseCtrl}/update"
            ),
            RouteRule::put(
                "{$baseRoute}/<id:\d+>",
                "{$baseCtrl}/update"
            ),
            RouteRule::delete(
                "{$baseRoute}/<id:\d+>",
                "{$baseCtrl}/delete"
            ),
        ];
    }
}
