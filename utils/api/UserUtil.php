<?php

namespace app\utils\api;

use app\utils\BaseUtil;
use app\models\api\User;

class UserUtil extends BaseUtil {
    
    const STATUS = [
        'NORMAL' => 1, // 正常
        'ENABLE' => 2, // 启用状态
        'DISABLE' => 4, // 停用状态
    ];
    
    const STATUS_LABELS = [
        1 => '正常', // 正常
        2 => '启用', // 启用状态
        4 => '停用', // 停用状态
    ];
    
    const GENDER = [
        'FEMALE' => 0, // 女
        'MALE' => 1, // 男
        'UNKNOW' => 2, // 未知
    ];
    
    const GENDER_LABELS = [
        0 => '女', // 女
        1 => '男', // 男
        2 => '未知', // 未知
    ];
    
    public static function toArray(User $user, $scope='all') {
        $userAttr = $user->attributes;
        switch ($scope) {
            default:
            case 'all':
                $userArray = self::toArrayByAll($userAttr);
                break;
            case 'list':
                $exceptField = [
                    'secret_code', 'operated_at', 'deleted'
                ];
                $userArray = self::toArrayByExcept($userAttr, $exceptField);
                break;
            case 'detail':
                $exceptField = [
                    'secret_code', 'deleted'
                ];
                $userArray = self::toArrayByExcept($userAttr, $exceptField);
                break;
        }
        return $userArray;
    }
    
    protected static function formatValue($user, $field, $default='') {
        if (! array_key_exists($field, $user)) {
            return $default;
        }
        $value = 'Null';
        switch ($field) {
            default:
                $value = $user[$field];
                break;
            case 'status':
                $statusLabels = array_flip(self::STATUS);
                if (array_key_exists($user[$field], $statusLabels)) {
                    $value = $statusLabels[$user[$field]];
                }
                break;
            case 'gender':
                $genderLabels = array_flip(self::GENDER);
                if (array_key_exists($user[$field], $genderLabels)) {
                    $value = $genderLabels[$user[$field]];
                }
                break;
        }
        return $value;
    }
    
    protected static function toArrayByAll($userAttr) {
        $userArray = [];
        foreach ($userAttr as $key => $value) {
            $userArray[$key] = self::formatValue($userAttr, $key);
        }
        return $userArray;
    }
    
    protected static function toArrayByInclude($userAttr, $fieldList=[]) {
        $userArray = [];
        foreach ($userAttr as $key => $value) {
            if (in_array($key, $fieldList)) {
                $userArray[$key] = self::formatValue($userAttr, $key);
            }
        }
        return $userArray;
    }
    
    protected static function toArrayByExcept($userAttr, $fieldList=[]) {
        $userArray = [];
        foreach ($userAttr as $key => $value) {
            if (! in_array($key, $fieldList)) {
                $userArray[$key] = self::formatValue($userAttr, $key);
            }
        }
        return $userArray;
    }
}
