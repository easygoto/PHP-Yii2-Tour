<?php


namespace app\core\containers;

use ReflectionClass;

class Message
{
    const FAIL    = '失败';
    const ERROR   = '错误';
    const SUCCESS = '成功';

    const SAVED        = '已保存';
    const SAVE_FAIL    = '保存失败';
    const SAVE_SUCCESS = '保存成功';

    const CREATED        = '已创建';
    const CREATE_FAIL    = '创建失败';
    const CREATE_SUCCESS = '创建成功';

    const UPDATED        = '已修改';
    const UPDATE_FAIL    = '修改失败';
    const UPDATE_SUCCESS = '修改成功';

    const DELETED        = '已删除';
    const DELETE_FAIL    = '删除失败';
    const DELETE_SUCCESS = '删除成功';

    const ID_EMPTY       = 'ID无效';
    const NOT_EXISTS     = '不存在';
    const NOT_RESULT     = '查询无果';
    const NO_SUCH_ACTION = '无此操作';

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
