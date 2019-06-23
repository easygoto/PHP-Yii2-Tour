<?php


namespace app\web;

use app\modules\dawn\components\TestComponent;
use yii\redis\Connection;

/**
 * @property Connection    redis
 *
 * @property TestComponent test
 */
class Application extends \yii\web\Application
{
}
