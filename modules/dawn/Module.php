<?php


namespace app\modules\dawn;

use app\modules\dawn\core\services;
use app\web\Yii;

/**
 * @property services\User         userService
 * @property services\Menu         menuService
 * @property services\GoodsService goodsService
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
