<?php


namespace app\web;

use app\components\HelloComponent;
use yii\redis\Connection;

/**
 * @property Connection     redis
 * @property HelloComponent hello
 */
class Application extends \yii\web\Application
{
    public function __construct($config = [])
    {
        Yii::$app = $this;
        parent::__construct($config);
    }
}
