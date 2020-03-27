<?php

namespace app\modules\dawn;

use app\modules\dawn\core\services\GoodsService;
use app\web\Yii;

/**
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
