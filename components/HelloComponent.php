<?php


namespace app\components;

class HelloComponent
{
    public function world($msg = 'world')
    {
        return "hello, $msg";
    }
}
