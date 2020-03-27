<?php

namespace app\core\containers;

use ReflectionClass;

class Message
{
    public const FAIL    = '失败';
    public const ERROR   = '错误';
    public const SUCCESS = '成功';

    public const SAVED        = '已保存';
    public const SAVE_FAIL    = '保存失败';
    public const SAVE_SUCCESS = '保存成功';

    public const CREATED        = '已创建';
    public const CREATE_FAIL    = '创建失败';
    public const CREATE_SUCCESS = '创建成功';

    public const UPDATED        = '已修改';
    public const UPDATE_FAIL    = '修改失败';
    public const UPDATE_SUCCESS = '修改成功';

    public const DELETED        = '已删除';
    public const DELETE_FAIL    = '删除失败';
    public const DELETE_SUCCESS = '删除成功';

    public const ID_EMPTY       = 'ID无效';
    public const NOT_EXISTS     = '不存在';
    public const NOT_RESULT     = '查询无果';
    public const NO_SUCH_ACTION = '无此操作';

    protected static function prefix(): string
    {
        return '';
    }

    public static function get($constName = '')
    {
        $result = (new ReflectionClass(__CLASS__))->getConstant($constName) ?? '';
        return $result ? (static::prefix() . $result) : '';
    }
}
