<?php

namespace Trink\Core\Helper;

use ReflectionObject;

class Result
{
    private $status;
    private $msg;
    private $data;

    /**
     * Result constructor.
     *
     * @param int    $status
     * @param string $msg
     * @param array  $data
     */
    private function __construct(int $status, string $msg, array $data)
    {
        $this->status = $status;
        $this->msg = $msg;
        $this->data = $data;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getMsg(): string
    {
        return $this->msg;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @return bool
     */
    public function isSuccess()
    {
        return $this->status === 0;
    }

    /**
     * @return bool
     */
    public function isFail()
    {
        return $this->status !== 0;
    }

    /**
     * @return array
     */
    public function asArray()
    {
        $properties = [];
        $object = new ReflectionObject($this);
        $fieldList = $object->getProperties();
        $fieldNameList = array_column($fieldList, 'name');
        foreach ($fieldNameList as $fieldName) {
            $properties[$fieldName] = $this->$fieldName;
        }
        return array_merge($properties, get_object_vars($this));
    }

    /**
     * @return false|mixed|string
     */
    public function asJson()
    {
        return json_encode($this->asArray());
    }

    /**
     * 错误返回
     *
     * @param string $msg    返回消息
     * @param array  $debug  调试信息
     * @param int    $status 状态码
     *
     * @return Result
     */
    public static function fail(string $msg = 'FAIL', array $debug = [], int $status = 1): Result
    {
        return new static($status, $msg, ['debug' => $debug]);
    }

    /**
     * 正常返回
     *
     * @param array  $data   返回数据
     * @param string $msg    返回消息
     * @param int    $status 状态码
     *
     * @return Result
     */
    public static function success(string $msg = 'OK', array $data = [], int $status = 0): Result
    {
        return new static($status, $msg, $data);
    }

    /**
     * 列表成功返回
     *
     * @param array $list
     * @param int   $total
     * @param int   $pageSize
     *
     * @return Result
     */
    public static function lists(array $list, int $total, int $pageSize = 15): self
    {
        return new static(0, 'OK', [
            'list'       => $list,
            'total'      => $total,
            'totalPages' => ceil($total / $pageSize),
        ]);
    }

    /**
     * 基础返回
     *
     * @param int    $status 状态码
     * @param string $msg    返回消息
     * @param array  $data   返回数据
     * @param array  $extra  扩展使用
     *
     * @return Result
     */
    public static function result(int $status, string $msg, array $data, array $extra = []): Result
    {
        $message = new static($status, $msg, $data);
        foreach ($extra as $key => $value) {
            $message->$key = $value;
        }
        return $message;
    }
}
