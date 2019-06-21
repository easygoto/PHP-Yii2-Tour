<?php


namespace Trink\Core\Helper;

use ReflectionObject;

/**
 * @property array debug
 */
class ReturnResult
{
    private $status;
    private $msg;
    private $data;

    /**
     * @param int    $status
     * @param string $msg
     * @param array  $data
     */
    private function __construct(int $status, string $msg, array $data)
    {
        $this->status = $status;
        $this->msg    = $msg;
        $this->data   = $data;
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
        $properties      = [];
        $object          = new ReflectionObject($this);
        $field_list      = $object->getProperties();
        $field_name_list = array_column($field_list, 'name');
        foreach ($field_name_list as $field_name) {
            $properties[$field_name] = $this->$field_name;
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
     * @param array  $data   调试信息
     * @param int    $status 状态码
     *
     * @return ReturnResult
     */
    public static function fail(string $msg, array $data = [], int $status = 1): self
    {
        return new self($status, $msg, $data);
    }

    /**
     * 正常返回
     *
     * @param string $msg    返回消息
     * @param array  $data   返回数据
     *
     * @return ReturnResult
     */
    public static function success(string $msg = '', array $data = []): self
    {
        return new self(0, $msg, $data);
    }

    /**
     * 列表成功返回
     *
     * @param array  $list
     * @param int    $total
     * @param int    $pageSize
     *
     * @return ReturnResult
     */
    public static function lists(array $list, int $total, int $pageSize = Constant::DEFAULT_PAGE_SIZE): self
    {
        return new self(0, '', [
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
     * @return ReturnResult
     */
    public static function result(int $status, string $msg, array $data, array $extra = []): self
    {
        $message = new self($status, $msg, $data);
        foreach ($extra as $key => $value) {
            $message->$key = $value;
        }
        return $message;
    }
}

