<?php


namespace app\modules\dawn;

use app\modules\dawn\core\services\GoodsService;
use app\modules\dawn\core\services\MenuService;
use app\modules\dawn\core\services\UserService;
use app\web\Yii;

/**
 * @property UserService  userService
 * @property MenuService  menuService
 * @property GoodsService goodsService
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
