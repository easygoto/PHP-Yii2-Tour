<?php


namespace app\core\helpers;

use Trink\Core\Library\Format;

class SortHandle
{
    protected static $instance;

    private $props = [];

    /**
     * @param array|string $keywords
     *
     * @return SortHandle
     */
    public static function load($keywords): SortHandle
    {
        $instance = new static();
        if (is_array($keywords)) {
            $instance->parse($keywords['sort'] ?? '');
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

    public function getProps(): array
    {
        return $this->props;
    }
}
