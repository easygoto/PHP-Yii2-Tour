<?php


namespace app\modules\dawn\core\containers\messages;

use app\modules\dawn\core\containers\Message;

class Goods extends Message
{
    protected static function prefix(): string
    {
        return '商品';
    }
}
