<?php


namespace app\modules\dawn\helpers;

class Message extends \app\helpers\Message
{
    protected static function prefix(): string
    {
        return '商品';
    }
}
