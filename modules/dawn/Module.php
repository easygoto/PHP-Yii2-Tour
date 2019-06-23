<?php


namespace app\modules\dawn;

use app\web\Yii;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
    }
}
