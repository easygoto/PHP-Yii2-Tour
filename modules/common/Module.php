<?php

namespace app\modules\common;

use app\web\Yii;

/**
 * common module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\common\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        Yii::configure($this, require __DIR__ . '/config/web.php');
        // custom initialization code goes here
    }
}
