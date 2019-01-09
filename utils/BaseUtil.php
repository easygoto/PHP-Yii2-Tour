<?php

namespace app\utils;

use yii\helpers\ArrayHelper;

class BaseUtil {
    
    public static function getTrimValue(array $arr, $key, $default='') {
        return self::getTrimCharValue($arr, $key, $default);
    }

    public static function getTrimCharValue(array $arr, $key, $default='', $trim=' ') {
        $value = ArrayHelper::getValue($arr, $key, $default);
        if (is_string($value)) {
            return trim($value, $trim);
        }
        return $value;
    }
}
