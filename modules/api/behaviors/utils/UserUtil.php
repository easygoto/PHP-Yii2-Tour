<?php

namespace app\modules\api\behaviors\utils;

use app\behaviors\utils\BaseUtil;

class UserUtil extends BaseUtil
{
    const STATUS = [
        1 => '正常',
        2 => '启用',
        4 => '停用',
    ];
    
    const GENDER = [
        0 => '女',
        1 => '男',
        2 => '未知',
    ];
    
    public static function toArray($user, $scope = 'all')
    {
        if ($user instanceof User) {
            $userAttr = $user->attributes;
        } elseif (is_array($user)) {
            $userAttr = $user;
        } else {
            return $user;
        }
        
        switch ($scope) {
            default:
            case 'all':
                $userArray = self::toArrayByAll($userAttr);
                break;
            case 'list':
                $exceptField = [
                    'secret_code', 'operated_at', 'deleted',
                ];
                $userArray   = self::toArrayByExcept($userAttr, $exceptField);
                break;
            case 'detail':
                $exceptField = [
                    'secret_code', 'deleted',
                ];
                $userArray   = self::toArrayByExcept($userAttr, $exceptField);
                break;
        }
        return $userArray;
    }
    
    /**
     * 格式化用户各字段的值 db to view
     * @param $user
     * @param $field
     * @param string $default
     * @return string|null
     */
    protected static function formatValue($user, $field, $default = '')
    {
        if (! array_key_exists($field, $user)) {
            return $default;
        }
        $value = null;
        switch ($field) {
            default:
                $value = $user[$field];
                break;
        }
        return $value;
    }
    
    protected static function toArrayByAll($user_attr)
    {
        $user_array = [];
        foreach ($user_attr as $key => $value) {
            $user_array[$key] = self::formatValue($user_attr, $key);
        }
        return $user_array;
    }
    
    protected static function toArrayByInclude($user_attr, $field_list = [])
    {
        $user_array = [];
        foreach ($user_attr as $key => $value) {
            if (in_array($key, $field_list)) {
                $user_array[$key] = self::formatValue($user_attr, $key);
            }
        }
        return $user_array;
    }
    
    protected static function toArrayByExcept($user_attr, $field_list = [])
    {
        $user_array = [];
        foreach ($user_attr as $key => $value) {
            if (! in_array($key, $field_list)) {
                $user_array[$key] = self::formatValue($user_attr, $key);
            }
        }
        return $user_array;
    }
}
