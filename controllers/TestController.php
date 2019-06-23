<?php


namespace app\controllers;

use app\web\Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionRedis()
    {
        echo '<pre>';
        $redis  = Yii::$app->redis;
        $result = $redis->hmset('test_collection', 'key1', 'val1', 'key2', 'val2');
        print_r($result);
    }

    public function actionWelcome()
    {
        $this->asJson([
            $this->action->id => Yii::$app->hello->world(),
        ]);
    }
}
