<?php


namespace app\modules\dawn;

use app\modules\dawn\components\services\Menu;
use app\web\Yii;

/**
 * @property Menu menuService
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
