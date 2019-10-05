<?php


namespace app\modules\dawn\helpers\messages;

use app\helpers\Message;

class Goods extends Message
{
    protected static function prefix(): string
    {
        return '商品';
    }
}
