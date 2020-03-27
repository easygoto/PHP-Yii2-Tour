<?php

namespace Trink\Core\Helper;

class Format
{
    // 多维数组的下划线转驼峰、驼峰转下划线

    /**
     * 下划线转驼峰
     *
     * @param        $words
     * @param string $separator
     *
     * @return string
     */
    public static function toCamelCase($words, $separator = '_')
    {
        $words = $separator . str_replace($separator, " ", strtolower($words));
        return ltrim(str_replace(" ", "", ucwords($words)), $separator);
    }

    /**
     * 驼峰命名转下划线
     *
     * @param        $words
     * @param string $separator
     *
     * @return string
     */
    public static function toUnderScore($words, $separator = '_')
    {
        return strtolower(preg_replace('/([a-z])([A-Z])/', "$1" . $separator . "$2", $words));
    }

    public static function array2CamelCase($list, $separator = '_')
    {
        $temp = [];
        foreach ($list as $key => $value) {
            $newKey = self::toCamelCase($key, $separator);
            if (is_array($value)) {
                $value = self::array2CamelCase($value, $separator);
            }
            $temp[$newKey] = $value;
        }
        return $temp;
    }

    public static function array2UnderScore($list, $separator = '_')
    {
        $temp = [];
        foreach ($list as $key => $value) {
            $newKey = self::toUnderScore($key, $separator);
            if (is_array($value)) {
                $value = self::array2UnderScore($value, $separator);
            }
            $temp[$newKey] = $value;
        }
        return $temp;
    }

    public static function filterFieldsInclude($list, $include = [])
    {
        $temp = [];
        foreach ($list as $key => $value) {
            if (is_array($value)) {
                $temp[$key] = self::filterFieldsInclude($value, $include);
                continue;
            }
            if (in_array($key, $include)) {
                $temp[$key] = $value;
            }
        }
        return $temp;
    }

    public static function filterFieldsExclude($list, $exclude = [])
    {
        $temp = [];
        foreach ($list as $key => $value) {
            if (is_array($value)) {
                $temp[$key] = self::filterFieldsExclude($value, $exclude);
                continue;
            }
            if (!in_array($key, $exclude)) {
                $temp[$key] = $value;
            }
        }
        return $temp;
    }
}
