<?php

namespace Trink\Core\Helper\Yii2;

/**
 * Class RouteRule
 *
 * @package Trink\Core\Helper\Yii2
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
                "{$baseCtrl}/get"
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

    public static function noRest($options = [])
    {
        $module = $options['module'] ?? '\w+';
        $category = $options['category'] ?? '\w+';
        $controller = $options['controller'] ?? '\w+';

        if ($module == '\w+' && $category == '\w+' && $controller == '\w+') {
            return [];
        } elseif ($module == '\w+' && $category == '\w+' && $controller != '\w+') {
            return [
                "<controller:{$controller}>/<action:\w+>" => "<controller>/<action>",
            ];
        } elseif ($module == '\w+' && $category != '\w+') {
            return [
                "<controller:{$controller}>/<action:\w+>" => "<controller>/<action>",
                "<category:{$category}>/<controller:{$controller}>/<action:\w+>" => "<category>/<controller>/<action>"
            ];
        } elseif ($module != '\w+' && $category == '\w+') {
            return [
                "<module:{$module}>" => "<module>",
                "<module:{$module}>/<controller:{$controller}>/<action:\w+>" => "<module>/<controller>/<action>",
            ];
        } else {
            return [
                "<module:{$module}>" => "<module>",
                "<module:{$module}>/<category:{$category}>/<controller:{$controller}>/<action:\w+>" =>
                    "<module>/<category>/<controller>/<action>",
            ];
        }
    }
}
