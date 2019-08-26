<?php


namespace app\modules\dawn;

use app\modules\dawn\components\services\MenuService;
use app\modules\dawn\components\Test;
use app\web\Yii;

/**
 * @property Test        test
 * @property MenuService menuService
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
