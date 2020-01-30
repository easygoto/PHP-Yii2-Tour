<?php

namespace app\modules\oa;

use app\web\Yii;

/**
 * oa module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\oa\controllers';

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
