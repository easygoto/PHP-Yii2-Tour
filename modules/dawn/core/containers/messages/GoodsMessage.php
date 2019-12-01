<?php


namespace app\modules\dawn\core\containers\messages;

use app\core\containers\Message;

class GoodsMessage extends Message
{
    protected static function prefix(): string
    {
        return '商品';
    }
}
