<?php

namespace Trink\Frame\Lib;

/**
 * Class RouteRule
 *
 * @package Trink\Frame\Lib
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
        $defaults = (isset($arguments[2]) && !empty($arguments[2])) ? $arguments[2] : [];
        return self::rule($pattern, $route, $defaults, strtoupper($name));
    }

    public static function putPatch($pattern, $route, $defaults = [])
    {
        return self::rule($pattern, $route, $defaults, 'PUT,PATCH');
    }

    public static function rule($pattern, $route, $defaults, $verb)
    {
        return [
            'pattern'  => $pattern,
            'route'    => $route,
            'defaults' => $defaults,
            'verb'     => $verb,
        ];
    }
}
