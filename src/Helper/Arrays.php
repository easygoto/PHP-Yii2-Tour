<?php


namespace Trink\Core\Helper;

class Arrays
{
    public static function getValue($list, string $key, $default = '')
    {
        if (is_array($list)) {
            return $list[$key] ?? $default;
        } elseif (is_object($list)) {
            return $list->$key ?? $default;
        }
        return $default;
    }

    public static function getValueNotEmpty($list, string $key, $default = '')
    {
        return ($list[$key] ?? $list->$key) ?: $default;
    }

    public static function getInteger($list, string $key, $default = '')
    {
        return (int)self::getValue($list, $key, $default);
    }

    public static function getDigits($list, string $key, $decimals = 2, $default = '')
    {
        return (float)number_format(self::getValue($list, $key, $default), $decimals);
    }
}
