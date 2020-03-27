<?php

namespace Trink\Core\Helper;

class Arrays
{
    // 批量将数组中指定的值创建出一个新的数组
    // 数组对象互转
    // 通过点分割的方式在数组中取值
    public static function get($list, string $key = null, $default = null, $separator = '.')
    {
        if ($key === null) {
            return $list;
        }
        if (strpos($key, $separator) !== false) {
            $keyMap = explode($separator, $key);
            $temp = $list;
            foreach ($keyMap as $item) {
                if (is_array($list)) {
                    $temp = $temp[$item] ?? $default;
                } elseif (is_object($list)) {
                    $temp = $temp->$item ?? $default;
                } else {
                    return $default;
                }
            }
            return $temp;
        }
        if (is_array($list)) {
            return $list[$key] ?? $default;
        } elseif (is_object($list)) {
            return $list->$key ?? $default;
        }
        return $default;
    }

    public static function getInt($list, string $key, $default = '')
    {
        return (int)self::get($list, $key, $default);
    }

    public static function getDigits($list, string $key, $decimals = 2, $default = '')
    {
        return (float)number_format(self::get($list, $key, $default), $decimals, '.', '');
    }
}
