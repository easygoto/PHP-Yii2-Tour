<?php


namespace app\modules\dawn;

use app\modules\dawn\components\TestComponent;
use app\web\Yii;

/**
 * @property TestComponent test
 */
class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
