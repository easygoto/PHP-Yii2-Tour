<?php


namespace app\core\helpers;

use Trink\Core\Helper\Format;

class SortHandler
{
    protected static $instance;

    private $props = [];

    public static function load($keywords): SortHandler
    {
        $instance = new static();
        if (is_array($keywords)) {
            $instance->parse($keywords['_sort'] ?? '');
        } elseif (is_string($keywords)) {
            $instance->parse($keywords);
        }
        return $instance;
    }

    protected function parse(string $sort)
    {
        $sorts = explode(',', $sort);
        foreach ($sorts as $sort) {
            $firstChar = $sort[0] ?? '';
            if (!$firstChar) {
                continue;
            }
            $orderColumn = Format::toUnderScore(ltrim($sort, '-+'));
            $orderMethod = $firstChar == '-' ? 'DESC' : 'ASC';
            $this->props[$orderColumn] = $orderMethod;
        }
    }

    public function setProps(array $props): SortHandler
    {
        $this->props = $props;
        return $this;
    }

    public function getProps(): array
    {
        return $this->props;
    }

    public function hasRule($column)
    {
        return array_key_exists($column, $this->props);
    }

    public function addRule($column, $type = 'ASC')
    {
        switch (strtoupper($type)) {
            case 0:
            case 'ASC':
            default:
                $this->props[$column] = 'ASC';
                break;
            case 1:
            case 'DESC':
                $this->props[$column] = 'DESC';
                break;
        }
        return $this;
    }
}
