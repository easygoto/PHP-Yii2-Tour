<?php


namespace app\web;

use app\components\HelloComponent;
use Trink\Core\Helper\Result;
use yii\redis\Connection;

/**
 * @property Connection     redis
 * @property HelloComponent hello
 * @property Result         result
 */
class Application extends \yii\web\Application
{
    public function __construct($config = [])
    {
        Yii::$app = $this;
        parent::__construct($config);
    }
}
