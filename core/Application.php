<?php

namespace app\web;

use yii\redis\Connection;

/**
 * @property Connection     redis
 */
class Application extends \yii\web\Application
{
    public function __construct($config = [])
    {
        Yii::$app = $this;
        parent::__construct($config);
    }
}
