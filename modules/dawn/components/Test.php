<?php


namespace app\modules\dawn\components;

use yii\base\Component;

class Test extends Component
{
    public function welcome($name = 'hello, world')
    {
        return $name;
    }
}
