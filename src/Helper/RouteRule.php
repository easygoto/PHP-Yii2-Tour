<?php

namespace Trink\Core\Helper;

/**
 * Class RouteRule
 *
 * @package Trink\Core\Helper
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
            'pattern'  => $pattern,
            'route'    => $route,
            'defaults' => $defaults,
            'verb'     => $verb,
        ];
    }

    /**
     * 增删改查
     *
     * @param string $baseRoute
     *
     * @return array
     */
    public static function base(string $baseRoute)
    {
        return [
            RouteRule::post(
                "{$baseRoute}",
                "{$baseRoute}/add"
            ),
            RouteRule::get(
                "{$baseRoute}/list/<page:\d+>",
                "{$baseRoute}/index",
                ['page' => 1]
            ),
            RouteRule::get(
                "{$baseRoute}/<id:\d+>",
                "{$baseRoute}/get"
            ),
            RouteRule::put(
                "{$baseRoute}/<id:\d+>",
                "{$baseRoute}/edit"
            ),
            RouteRule::delete(
                "{$baseRoute}/<id:\d+>",
                "{$baseRoute}/delete"
            ),
        ];
    }
}
