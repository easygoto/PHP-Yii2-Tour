<?php


namespace app\modules\dawn;

use app\modules\dawn\components\services;
use app\web\Yii;

/**
 * @property services\User  userService
 * @property services\Menu  menuService
 * @property services\Goods goodsService
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
